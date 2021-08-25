<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    /**
     * Login a user
     * Get a JWT via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        // check if fields are empty
        if (empty($request->email) or empty($request->password)) 
        {
            return response()->json(['status' => 'error', 'message' => 'You must fill all the fields'], 400);
        }

        try {

            $credentials = request(['email', 'password']);

            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);        
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }



    }

    /**
     * Register a user / create an account
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        // check if fields are empty
        if (empty($name) or empty($email) or empty($password)) 
        {
            return response()->json(['status' => 'error', 'message' => 'You must fill all the fields'], 400);
        }

        // check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return response()->json(['status' => 'error', 'message' => 'You must enter a valid email'], 400);
        }

        // check if password is greater than 5 characters
        if (strlen($password) < 6) 
        {
            return response()->json(['status' => 'error', 'message' => 'Password should be min 6 characters'], 400);
        }

        //check if user already exist in the database
        if (User::where('email', '=', $email)->exists()) 
        {
            return response()->json(['status' => 'error', 'message' => 'User already exists with this email'], 400);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = app('hash')->make($request->password);

            if ($user->save()){
                // redirect to login method to have access_token automatically
                return $this->login($request);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {

        try {
            auth()->logout();

            return response()->json(['message' => 'Successfully logged out'], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
    
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


}
