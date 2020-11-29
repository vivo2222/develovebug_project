<div class="hidden">
    <div class="wrapper form-div col-md-4 offset-md-4">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="close-icon bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <div class="title-text">
            <div class="title join">Join Class</div>
            <div class="title create">Create Class</div>
            
        </div>
        <div class="form-container">
            <div class="slide-controls">
            <input type="radio" name="slide" id="join" checked>
            <input type="radio" name="slide" id="create">
            <label for="join" class="slide join">Join</label>
            <label for="create" class="slide create">Create</label>
            <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
            <form action="" class="join" method="POST">
                <div class="field">
                <p>Ask your teacher for class code</p>
                <input type="text" placeholder="Class Code" required>
                </div>
                <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="join-class-btn" value="Join">
                </div>
            </form>
            <form action="" class="create" method="POST">
                <div class="field">
                <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="field">
                <input type="text" name="semester" placeholder="Semester" >
                </div>
                <div class="field">
                <input type="text" name="room" placeholder="Room" >
                </div>
                <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="create-class-btn" value="Create">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>