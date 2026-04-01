let idkhoa;

function xembaihoc(idkhoa) {
  window.location.href = "index.php?page_layout=xembaihoc&id_kh=" + idkhoa;
}

function xembaitap(idkhoa) {
  window.location.href = "index.php?page_layout=xembaitap&id_kh=" + idkhoa;
}

function xemvideo(id) {
  let iframes = document.getElementsByTagName("iframe");
  let targetIndex = id;

  if (!iframes[targetIndex]) return;

  let isShowing = iframes[targetIndex].style.display === "block";

  for (let i = 0; i < iframes.length; i++) {
    iframes[i].style.display = "none";
  }

  if (!isShowing) {
    iframes[targetIndex].style.display = "block";
  }
}
