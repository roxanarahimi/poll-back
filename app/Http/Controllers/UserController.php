<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\UserPoll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function sendOtp(Request $request)
    {
        try {
            $mobile = $this->faToEn($request['mobile']);
//            $user = User::where('mobile', $mobile)->first();
//            if ($user && $user->role === 'admin') {
//                return response(['message' => 'این شماره موبایل قابل استفاده نیست. لطفا با شماره دیگری تلاش کنید.'], 422);
//            }
            $code = rand(1001, 9999);
            $text = ' به نودالیت خوش آمدید. کد تایید شما:' . $code;
            $sms = new Request([
                'mobile' => $mobile,
                'message' => $text,
            ]);

            $send = $this->sendSms($sms);
            Cache::put($mobile, $code, 60);
            if ($send->getStatusCode() === 200) {
                return response(['message' => 'کد تایید ارسال شد.'], 200);

            } else {
                return $send;
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function sendSms(Request $request): Response
    {
        try {
            $api = new \Kavenegar\KavenegarApi("4470686233536566795848666962306F59327335574D786772655075704668586C31415162524E717747413D");
            $sender = "10005989";
            $message = $request['message'];
            $receptor = array($request['mobile']);
            $result = $api->Send($sender, $receptor, $message);
            if ($result) {
                $info = [
                    "messageid" => $result[0]->messageid,
                    "message" => $result[0]->message,
                    "status" => $result[0]->status,
                    "statustext" => $result[0]->statustext,
                    "sender" => $result[0]->sender,
                    "receptor" => $result[0]->receptor,
                    "date" => $result[0]->date,
                    "cost" => $result[0]->cost
                ];

            } else {
                $info = $result;
            }
            return response($info, 200);

        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            return response($e->errorMessage(),$e->getCode());
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            response($e->errorMessage(),$e->getCode());
        }
    }

    public function verifyMobile(Request $request)
    {
        try {
            $mobile = $this->faToEn($request['mobile']);
            $inputCode = $this->faToEn($request['code']);
            $code = Cache::get($mobile);

            if ($code === $inputCode) {
                $user = User::where('mobile', $mobile)->first();
                if (!$user) {
                    $fields = new Request([
                        'mobile' => $mobile,
                    ]);
                    $user = $this->store($fields);
                }
                return response(['user' => new UserResource($user), 'message' => 'شماره موبایل با موفقیت تایید شد.'], 200);
            } else {
                return response(['message' => 'کد وارد شده اشتباه است.'], 422);
            }
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function store(Request $request): Response
    {
        try {
            $user = User::where('mobile', $request['mobile'])->first();
            if (!$user) {
                $user = User::create($request['mobile']);
            }
            return response($user, 201);
        } catch (\Exception $exception) {
            return $exception;
        }
    }


    function faToEn($string)
    {
        return preg_replace_callback('/[۰-۹٠-٩]/u', function ($match) {
            $num = ['۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
                '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'];
            return $num[$match[0]];
        }, $string);
    }

    public function questions()
    {
        try {
            $data = Question::orderBy('id')->get();
            return response(QuestionResource::collection($data), 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function saveAnswer(Request $request)
    {
        try {
            foreach ($request['answers'] as $id) {
                UserPoll::create([
                    'user_id' => $request['user_id'],
                    'question_option_id' => $id,
                ]);
            }

            $user = User::find($request['user_id']);
            return response(new UserResource($user), 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
