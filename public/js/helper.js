// Function for Request data from backend with ajax
function postData(url, elm, cb) {
  console.log("Ajax working")
  BBbutton = elm
  let obj = { ...elm.dataset }
  if (!obj.action) {
    return null;
  }
  let action = obj.action
  let token = document.getElementsByName("_token")[0].value
  $.ajax({
    type: "post",
    datatype: "json",
    url: url,
    data: obj,
    headers: {
      'X-CSRF-TOKEN': document.querySelector("[name=csrf-token]").content
    },
    success: function (data) {
      if (!data.error) {
        return cb(data, action)
      }
    }
  });
}