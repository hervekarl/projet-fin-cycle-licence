<?php

namespace App\Http\Controllers;

class RequestReturns
{
    public const INSERT_FAILED = 100; 
    public const INSERT_SUCCESSFUL = 101;
    public const INSERT_NOT_PERMIT = 102;

    public const SELECT_FAILED = 200;
    public const SELECT_SUCCESSFUL = 201;
    public const SELECT_NOT_PERMIT = 202;

    public const UPDATE_FAILED = 300;
    public const UPDATE_SUCCESSFUL = 301;
    public const UPDAT_NOT_PERMIT = 302;

    public const DELETE_FAILED = 400;
    public const DELETE_SUCCESSFUL = 401;
    public const DELETE_NOT_PERMIT = 402;

    
    public const NOT_EXIST = 500;
    
    public const ALREADY_EXIST = 600;
    
    public const NOT_CONNECTED = 700;

    public const CONNECTION_SUCCESSFUL = 800;

    public const DECONNECTION_SUCCESSFUL = 800;


    public const UNIDENTIFIED = 1000;






    public const DELETE_USER_NOT_PERMIT = 601;

    public const INSSERT_NOT_PERMIT = 102;
}