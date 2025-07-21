<?php

namespace App\Http\Controllers;

use App\Events\MessageUpdate;
use App\Models\Conversation;
use App\Models\Member;
use App\Models\Message;
use App\Models\User;
use DB;
use Error;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class ConversationController extends Controller
{
    public function test(){
        
    }
    public function setMessage(Request $request){
        try{
            $validate = $request->validate([
                'message'=>['required', 'string'],
                'idChat'=>['required', 'integer']
            ]);
            $msg = Message::create([
                'text'=>$request->message,
                'conversation_id'=>$request->idChat,
                'member_id'=>$request->user()->getMember($request->idChat)->id,
            ]);
            event(new MessageUpdate($request->idChat, $request->message));
            return response()->json(['status'=>1]);
        }
        catch(Error $er){
            return response()->json(['error'=>'error sending']);
        }
    }
    public function getConversations(Request $request){
        $convs_id = Member::where('user_id', $request->user()->id)->distinct()->get()->pluck('conversation_id');
        $convs = Conversation::whereIn('id', $convs_id)->get();
        return response()->json(['conversations'=>$convs]);
    }
    public function getMessages(Request $request, $idChat){
        $limit = 30;
        $offset = $request->get('offset');
        $msgs = [];
        if($offset == null){
            $offset=0;
        }
        //check access
        $accessMember = Member::where('conversation_id', $idChat)
        ->where('user_id', $request->user()->id)
        ->first();
        if($accessMember != null){
            $msgs = Message::where('conversation_id', $idChat)->limit(30)->get();
        }
        return response()->json(['messages'=>$msgs]);
    }
    public function newDialog(Request $request){
        $maker = $request->user();
        $companion = User::find($request->get('companion'));
        $type = 'dialog';

        $dialog = $this->getDialog($companion, $maker);
        return $dialog;
    }
    public function newConversation(Request $request){
        $maker = $request->user();
        $name = $request->get('name');
        $members = $request->get('members'); //[]
        $type = 'group';
    }
    private function getDialog(User $userCompanion, User $userMaker){
        // $nameDialog = $userMaker->name . "-" . $userCompanion->name;
        $nameDialog = 'dialog';
        $userHasMembers = Member::where('user_id', $userMaker->id)->get();
        $companionHasMembers = Member::where('user_id', $userCompanion->id)->get();
        $conv_id = $userHasMembers->pluck('conversation_id')->intersect($companionHasMembers->pluck('conversation_id'));
        $conv = Conversation::where('id', $conv_id)->where('type', 'dialog')->first();
        if($conv == null){
            $cv = Conversation::create([
                'name'=>$nameDialog,
                'type'=>'dialog',
            ]);
            Member::create([
                'conversation_id'=>$cv->id,
                'user_id'=>$userMaker->id,
                'member_role_id'=>1
            ]);
            Member::create([
                'conversation_id'=>$cv->id,
                'user_id'=>$userCompanion->id,
                'member_role_id'=>1
            ]);
            return $cv;
        }

        return $conv;
    }
    private function getConversation(string $name, array $members_id, $admin_id){

    }
    private function addMember($conversation_id, $member_id){

    }
}
