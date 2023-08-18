function sendComment() {
    const xhttp = new XMLHttpRequest();
    var articleId = document.getElementById("article_id").innerHTML;
    var articlecomment = document.getElementById('comment').value;
    var slug = document.getElementById('slug').innerHTML;
    xhttp.onload = function () {
        var res = JSON.parse(this.response);
        if (res.status == "success") {
            var html = `<div class="card comment-card p-3" id="` + res.data['id'] + `">
                <div class="justify-content-between align-items-center">
                  <div class="user align-items-center">
                    <span>
                      <small class="font-weight-bold text-primary">`+ res.userName + `</small> -- 
                      <small style="text-align:right">`+ res.data['created_at'] + `</small><br>
                      <small class="font-weight-bold">
                        <span class="input" role="textbox" contenteditable>`+ res.data['comment'] + ` </span>
                        </small>
                    </span>
                  </div>
                </div>
                <div style="text-align: right;">
                  <small onclick="deleteComment(`+ res.data['id'] + `)">Yorumu Sil</small>
                </div>
              </div>`;
            document.getElementById('comments').insertAdjacentHTML("beforeend", html);
        }
        else {
            document.getElementById('popup1').style.visibility = "visible";
            document.getElementById('popup1').style.opacity = 1;
        }
    }
    xhttp.open("GET", "comment/create?articleid=" + articleId + "&articlecomment=" + articlecomment + "&slug=" + slug + "", true);
    xhttp.send();
}

function closePopup() {
    document.getElementById('popup1').style.visibility = "hidden";
    document.getElementById('popup1').style.opacity = 0;
}


function deleteComment(commentId) {
    const xhttp = new XMLHttpRequest();
    var articleId = document.getElementById("article_id").innerHTML;
    var slug = document.getElementById('slug').innerHTML;
    xhttp.onload = function () {
        if (this.responseText == "success") {
            var element = document.getElementById(String(commentId));
            element.remove();
        }
    }
    xhttp.open("GET", "comment/delete?articleId=" + articleId + "&commentId=" + commentId + "&slug=" + slug + "", true);
    xhttp.send();
}