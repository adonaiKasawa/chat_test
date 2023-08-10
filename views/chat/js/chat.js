$(document).ready(function () {
  const baseUrl = "http://localhost/chat/";

  setInterval(() => {
    getAllUser();
    getAllInvitation();
    getAllFriends();
  }, 1000);

  function getAllUser() {
    $.ajax({
      url: `${baseUrl}chat/getAllUsers`,
      type: "POST",
      success: function (res) {
        // console.log(res);
        $(".listUsers").html(res)
      }
    })
  }
  function getAllInvitation() {
    $.ajax({
      url: `${baseUrl}chat/getAllInvitation`,
      type: "POST",
      success: function (res) {
        // console.log(res);
        $(".getAllInvitation").html(res)
      }
    })
  }
  function getAllFriends() {
    $.ajax({
      url: `${baseUrl}chat/getAllFriends`,
      type: "POST",
      success: function (res) {
        // console.log(res);
        $(".listFriends").html(res)
      }
    })
  }

  $(document).on("click",".sendInvitation", function() {
    let user_id = $(this).attr("id")
    $.ajax({
      url: `${baseUrl}chat/sendInvitation`,
      type: "POST",
      data: {
        user_id,
      },
      success: function (res) {
        alert(res)
      }
    })
  })
  $(document).on("click",".acceptInvitation", function() {
    let user_id = $(this).attr("id")
    $.ajax({
      url: `${baseUrl}chat/acceptInvitationOrrefuseInvitation`,
      type: "POST",
      data: {
        user_id,
        type: "accepte"
      },
      success: function (res) {
        alert(res)
      }
    })
  })

  $(document).on("click",".refuseInvitation", function() {
    let user_id = $(this).attr("id")
    $.ajax({
      url: `${baseUrl}chat/acceptInvitationOrrefuseInvitation`,
      type: "POST",
      data: {
        user_id,
        type: "refuse"
      },
      success: function (res) {
        alert(res)
      }
    })
  })

  $(document).on("click",".getChat", function() {
    let user_id = $(this).attr("id");
    $("#to_user_id").val(user_id);
    getChat(user_id);
  });

  function getChat(user_id) {
    $.ajax({
      url: `${baseUrl}chat/getChat`,
      type: "POST",
      data: {
        user_id,
      },
      success: function (res) {
       $(".listMessageByUser").html(res)
      }
    })
    // getChat(user_id)
  }

  $(document).on("click",".sendMessage", function() {
    let user_id = $("#to_user_id").val();
    let msg = $("#message").val()
    $.ajax({
      url: `${baseUrl}chat/sendMessage`,
      type: "POST",
      data: {
        user_id,
        msg
      },
      success: function (res) {
        console.log(res);
        getChat(user_id)
      }
    })
  })

})