let $userProfileControl  = $(".user-profile-control")
let $avatarImg = $('.avatar-img');

$('body').click(function(event) {
    if(event.target == $avatarImg[0]) {
        $(".user-profile-control").toggleClass('show-user-control')
    } else if(event.target !== $userProfileControl[0]) {
        $userProfileControl.removeClass('show-user-control')
    }
})