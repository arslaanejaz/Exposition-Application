<?php

namespace App\Http\Controllers;


use App\Helpers\CustomHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Repositories\Eloquent\Location;
use Repositories\Eloquent\Stand;
use Repositories\Eloquent\Company;

class StandController extends Controller
{
    private $stand;
    private $company;
    private $location;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Stand $stand, Company $company, Location $location)
    {
        $this->middleware('auth');
        $this->stand = $stand;
        $this->company = $company;
        $this->location = $location;

    }

    /**
     * Show Stand Reservation
     *
     * @return \Illuminate\Http\Response
     */
    public function standReservation($locationId, $standId)
    {
        $stand = $this->stand->findOrFail($standId);                //exception handling will show 404 on missing record
        $location = $this->location->findOrFail($locationId);       //exception handling will show 404 on missing record
        return view('stand/reserve', compact('stand', 'location'));
    }

    /**
     * Save Stand Reservation
     *
     * @return \Illuminate\Http\Response
     */
    public function reserve(Request $request)
    {
        //validation
        $messages = [
            'document.required' => 'Document is requred.',
        ];
        $this->validate($request, ['email' => 'required|email|string|max:250',
            'phone' => 'required|string|max:20',
            'logo'=>'required',
            'document'=>'required',
        ],
            $messages);

        $stand = $this->stand->findOrFail($request->stand_id);
        if($stand->company){
            return Redirect::back()->withErrors(["This Stand is registered by other company"]);
        }

        $uploadedDocument = $request->file('document');

        $docFileName = $uploadedDocument->getClientOriginalName();

        if (File::exists(Storage::disk('company_doc')->getAdapter()->getPathPrefix().$docFileName)) {
            // Split filename into parts
            $pathInfo = pathinfo($docFileName);
            $extension = isset($pathInfo['extension']) ? ('.' . $pathInfo['extension']) : '';

            // Look for a number before the extension; add one if there isn't already
            if (preg_match('/(.*?)(\d+)$/', $pathInfo['filename'], $match)) {
                // Have a number; increment it
                $base = $match[1];
                $number = intVal($match[2]);
            } else {
                // No number; add one
                $base = $pathInfo['filename'];
                $number = 0;
            }

            // Choose a name with an incremented number until a file with that name
            // doesn't exist
            do {
                $docFileName = $pathInfo['dirname'] . DIRECTORY_SEPARATOR . $base . ++$number . $extension;
            } while (File::exists(Storage::disk('company_doc')->getAdapter()->getPathPrefix().$docFileName));
        }

        Storage::disk('company_doc')
            ->put(
                $docFileName,
                file_get_contents($uploadedDocument),
                'public'
            );

        $uploadedLogo = $request->file('logo');

        $extension  = $uploadedLogo->guessExtension();
        $logoFileName = CustomHelper::generateRandomString(15) . '.' . $extension;

        Storage::disk('company_logo')
            ->put(
                $logoFileName,
                file_get_contents($uploadedLogo),
                'public'
            );
        $company = $this->company->create([
            'email' => $request->email,
            'phone' => $request->phone,
            'logo' => $logoFileName,
            'document' => $docFileName,
        ]);

        $user = Auth::user();
        $company->users()->save($user);

        $this->stand->find($request->stand_id)->company()->associate($company)->save();
        $this->stand->find($request->stand_id)->user()->associate($user)->save();


        return redirect('exposition-hall-map/'.$request->location_id);
    }


}
