// If you're using Internet Explorer, the Javascript on
// this page requires version 9 or up. Users of Windows
// 8 and up - and users of proper web browsers - should
// be fine.

var elements = document.getElementsByClassName('array_container');
for (var i = 0; i < elements.length; i++) {
  elements.item(i).onclick = foldToggle;
  addClass(elements.item(i), 'closed');
}

function foldToggle(e) {
  e.stopPropagation();
  toggleClass(this, 'closed');
}

function toggleClass(element, classToToggle) {
  if (hasClass(element, classToToggle)) {
    removeClass(element, classToToggle);
  }
  else {
    addClass(element, classToToggle);
  }
}

function hasClass(element, classToTest) {
  var classes = element.className.match(/\S+/g);
  if (classes !== null) {
    var classIndex = classes.indexOf(classToTest);
    if (classIndex > -1) {
      return true;
    }
  }
  return false;
}

function addClass(element, classToAdd) {
  if (!hasClass(element, classToAdd)) {
    element.className += ' ' + classToAdd;
  }
}

function removeClass(element, classToRemove) {
  var classes = element.className.match(/\S+/g);
  if (classes !== null) {
    var classIndex = classes.indexOf(classToRemove);
    if (classIndex > -1) {
      classes.splice(classIndex, 1);
      element.className = classes.join(' ');
    }
  }
}
