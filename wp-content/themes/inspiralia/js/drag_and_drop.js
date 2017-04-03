(function(window) {
  function triggerCallback(e, callback) {
    if(!callback || typeof callback !== 'function') {
      return;
    }
    var files;
    if(e.dataTransfer) {
      files = e.dataTransfer.files;
    } else if(e.target) {
      files = e.target.files;
    }
    callback.call(null, files);
  }
  function makeDroppable(ele, callback) {
    for (var i = 0 ; i < ele.length; i++) {
      ele[i].addEventListener('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        ele[i].classList.add('dragover');
      });

      ele[i].addEventListener('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        ele[i].classList.remove('dragover');
      });

      ele[i].addEventListener('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        ele[i].classList.remove('dragover');
        triggerCallback(e, callback);
      });
    }
  }
  window.makeDroppable = makeDroppable;
})(this);

(function(window) {
  makeDroppable(jQuery('.box__file'), function(files) { console.log(files); });
})(this);
