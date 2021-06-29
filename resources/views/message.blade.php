<li class="stitch">
    <a class="stitchUsername" href="/user/{{ $message->postedById }}">{{ $message->postedBy }}</a>
    <a class="stitchContentText" href="/message/{{ $message->id }}">{{ $message->body }}</a>
    <p class="stitchTimestamp">{{ $message->created_at->diffForHumans() }}</p>
</li>
