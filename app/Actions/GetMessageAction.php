<?php

namespace App\Actions;

use App\Models\Chat;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\CursorPaginator;

class GetMessageAction
{
    public static function execute(Chat $chat): CursorPaginator|array|Paginator
    {
        $messages = $chat->messages()
            ->latest()
            ->with(['sender'])
            ->withTrashed()
            ->paginate(10);
        dd($messages);
    }
}
