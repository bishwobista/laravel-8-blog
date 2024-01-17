@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 p-7 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/?u={{$comment->id}}" alt="avatar image" width="80" height="80"
             class="rounded-xl">
    </div>
    <div>
        <header>
            <h3 class="font-bold">{{$comment->user->username}}</h3>
            <p class="text-xs">Posted
                <time> {{$comment->created_at}}</time>
            </p>
        </header>
        <p class="mt-4">{{$comment->body}}</p>
    </div>
</article>
