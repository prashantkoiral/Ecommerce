<style>
    /* Style for the comment form */
    .comment-form {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f8f9fa;
    }

    .comment-form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
    }

    .comment-form button {
        display: block;
        margin: 10px auto;
        padding: 10px 20px;
        background-color: #ff6347;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 25px;
        transition: background-color 0.3s;
    }

    .comment-form button:hover {
        background-color: #ff4331;
    }

    /* Style for individual comments */
    .comments {
        margin-top: 20px;
    }

    .comment {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        background-color: white;
    }

    .comment strong {
        color: #007bff;
    }

    .comment p {
        margin: 0;
    }

    /* Style for comment titles */
    .comment-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* Style for reply section */
    .reply-form {
        margin-top: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f8f9fa;
    }
</style>
<div class="order-details" style="margin: 10px; padding: 20px; margin-bottom: 110px; border: 1px solid #ddd; background-color: #f8f9fa;">
    <!-- Comment form -->
    <h4 style="font-size: 24px; margin-bottom: 10px; text-align: center;">Leave a Comment</h4>
    <form class="comment-form" action="{{url('add_comment')}}" method="post">
        @csrf
        <input type="hidden" name="order_id" value="">
        <textarea name="comment" placeholder="Enter your comment" style="width: 100%; padding: 5px; font-size: 16px;"></textarea>
        <button type="submit" style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Submit Comment
        </button>
    </form>

    <!-- Comment titles -->
    <h4 style="font-size: 24px; margin-top: 20px; text-align: center;">All Comments:</h4>

    <!-- Display comments -->
    @foreach($comments as $comment)
    <div class="comment">
        <p><strong style="margin-left: 90px;">{{$comment->name}}</strong></p>
        <p style="margin-left: 90px;">{{$comment->comment}}</p>
        
        <form action="{{url('add_reply')}}" method="POST">
            <!-- Set the comment's ID as the value of the hidden input field -->
            @csrf
            <input type="text" id="commentId" name="commentId" hidden value="{{$comment->id}}">
            
            <!-- Reply link -->
            <a href="javascript:void(0);" style="color: blue; padding-left: 90px;" onclick="toggleReplyBox(this)">Reply</a>
            
            <!-- Reply box -->
            <div class="reply-box" style="display: none; margin-left: 20px; margin-top: 10px;">
                <textarea placeholder="Reply to this comment" name="reply" style="width: 100%; padding: 5px; font-size: 16px;" rows="2"></textarea>
                <button style="background-color: red; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
                <!-- Pass the comment's ID to the reply_close function -->
                <a href="javascript:void(0);" class="btn" onclick="reply_close(this)" data-Commentid="{{$comment->id}}">Close</a>
            </div>
        </form>
    </div>
@endforeach

</div>




<script>
  function toggleReplyBox(element) {
        var replyBox = element.parentNode.querySelector('.reply-box'); // Find the reply box within the parent form
        if (replyBox.style.display === "none" || replyBox.style.display === "") {
            replyBox.style.display = "block"; // Show the reply box
        } else {
            replyBox.style.display = "none"; // Hide the reply box
        }
    }

    function reply_close(caller) {
        
        
        var replyBox = caller.parentElement; // Get the parent element (reply box)
        replyBox.style.display = "none"; // Hide the reply box
    }
</script>

