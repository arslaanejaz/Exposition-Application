<?php
/**
 * Created by PhpStorm.
 * User: arslaan.e
 * Date: 2017-10-17
 * Time: 1:59 AM
 */

namespace Repositories\Eloquent;


class Company extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return \App\Company::class;
    }
}