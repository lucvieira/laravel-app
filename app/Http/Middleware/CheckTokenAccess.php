<?php

namespace App\Http\Middleware;
use Closure;

class CheckTokenAccess {

	function validateTokenAccess( $hash ){

        return $hash == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTHVjYXMgVmllaXJhIiwiaWQiOjk5OTk5OTk5fQ.7SbefdpndI6DgJz-vun2vw5nSUCYhpdyoTA7xgHdunE' ? true : false;
    }

    /**
     * Handle an incoming request.
     * Verify Token to private routes
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

    	$header = $request->header('Authorization');

    	if( $this->validateTokenAccess( $header ) == false ){

    		return response()->json( ['message' => 'Unauthorized' ], 401 );
    	}

    	return $next($request);
    }
}
?>
