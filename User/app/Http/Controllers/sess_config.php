<?php
    function start_sess()
	{
        if(!session_id())
        {
		    session_start();
            session_regenerate_id(true);
            //setcookie(session_name(), "", 0, "", "", false, true);
        }        
    }

    function end_sess()
    {
        if(session_id())
        {
            session_unset();
            session_destroy();
            //session_write_close();
        }
    }
