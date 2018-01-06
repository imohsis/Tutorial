// $(function(){
//     $('#markasread').click(function () {
//         alert('clicked')
//     })
// })

function markNotificationAsRead(count) {
    if (count !== 0) {
        $.get('/markAsRead');
    }
}