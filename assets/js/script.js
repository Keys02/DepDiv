let $userProfileControl  = $(".user-profile-control")
let $avatarImg = $('.avatar-img');
let $avatarImgUpload = $('.avatar-upload')
let $avatarUploadForm = $('.avatar-upload-form')

$('body').on('click', function(event) {
    if(event.target == $avatarImg[0]) {
        $(".user-profile-control").toggleClass('show-user-control')
    } else if(event.target !== $userProfileControl[0]) {
        $userProfileControl.removeClass('show-user-control')
    }
})

$('.edit-avatar-btn').on('click', function() {
    $avatarImgUpload.trigger('click');
})

$avatarImgUpload.on('change', function() {
    $avatarUploadForm.submit()
})

$('#summernote', '.editor').summernote({
    placeholder: 'What\'s on your mind...',
    height: 200,
    width: 800,
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['para', ['ul', 'ol']]
    ],
    disableResizeEditor: true
});

$('#summernote', '.answer-form').summernote({
    placeholder: 'What\'s on your mind',
    height: 80,
    width: 800,
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['para', ['ul', 'ol']]
    ],
    disableResizeEditor: true
})