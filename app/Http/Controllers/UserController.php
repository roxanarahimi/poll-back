<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\UserPoll;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sendCodeSms()
    {

    }
    public function verify()
    {

    }
    public function questions()
    {
        try {
            $data = Question::orderBy('id')->get();
            return response(QuestionResource::collection($data),200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    } public function saveAnswer(Request $request)
    {
        try {
            foreach ($request['answers'] as $id) {
                UserPoll::create([
                    'user_id' => $request['user_id'],
                    'question_option_id' => $id,
                ]);
            }

            $user = User::find($request['user_id']);
            return response(new UserResource($user),200);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
