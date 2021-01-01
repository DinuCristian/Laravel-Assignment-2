<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@foreach($comments as $comment)
    <div class="display-comment mt-4">
        <strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group mt-2">
                <textarea type="text" name="comment_comment" class="form-control" rows="3" cols="40"></textarea>
                <input type="hidden" name="movie_id" value="{{ $movie_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group mt-2">
                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    <svg class="w-6 h-6"  style="white-space: nowrap; display: inline-block"  fill="none" stroke="currentColor" width="25" height="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                    {{ __("Reply") }}
                </button>
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach