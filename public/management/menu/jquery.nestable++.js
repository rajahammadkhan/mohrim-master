/*jslint browser: true, devel: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
/*global $ */

/*************** General ***************/

// var updateOutput = function (e) {
//   var list = e.length ? e : $(e.target),
//     output = list.data("output");
//   if (window.JSON) {
//     if (output) {
//       output.val(window.JSON.stringify(list.nestable("serialize")));
//       console.log(JSON.parse(output.val()));
//     }
//   } else {
//     alert("JSON browser support required for this page.");
//   }
// };

var nestableList = $(".dd.nestable > .dd-list");

/***************************************/

/*************** Delete ***************/

var deleteFromMenuHelper = function (target) {
  if (target.data("new") == 1) {
    // if it's not yet saved in the database, just remove it from DOM
    target.fadeOut(function () {
      target.remove();
      // updateOutput($(".dd.nestable").data("output", $("#json-output")));
    });
  } else {
    // otherwise hide and mark it for deletion
    target.appendTo(nestableList); // if children, move to the top level
    target.data("deleted", "1");
    target.fadeOut();
  }
};

var deleteFromMenu = function () {
  var targetId = $(this).data("owner-id");
  var target = $('[data-id="' + targetId + '"]');

  // var result = confirm(
  //   "Delete " + target.data("name") + " and all its subitems ?"
  // );
  // if (!result) {
  //   return;
  // }

  // Remove children (if any)
  target.find("li").each(function () {
    deleteFromMenuHelper($(this));
  });

  // Remove parent
  deleteFromMenuHelper(target);

  // update JSON
  // updateOutput($(".dd.nestable").data("output", $("#json-output")));
  return;
};

/***************************************/

/*************** Edit ***************/

var menuEditor = $(".menu-editor");
var editButton = $(".editButton");
var editInputName = $(".editInputName");
var editInputSlug = $(".editInputSlug");
var currentEditName = $(".currentEditName");

// Prepares and shows the Edit Form
var prepareEdit = function () {
  var targetId = $(this).data("owner-id");
  var target = $('[data-id="' + targetId + '"]');

  editInputName.val(target.data("name"));
  editInputSlug.val(target.data("slug"));
  currentEditName.html(target.data("name"));
  editButton.data("owner-id", target.data("id"));
  menuEditor.fadeIn();
};

// Edits the Menu item and hides the Edit Form
var editMenuItem = function () {

  var targetId = $(this).data("owner-id");
  var target = $('[data-id="' + targetId + '"]');

  var newName = editInputName.val();
  var newSlug = editInputSlug.val();

  target.data("name", newName);
  target.data("slug", newSlug);

  target.find("> .dd-handle").html(newName);
  console.log( targetId)


  menuEditor.fadeOut();

  // update JSON
  // updateOutput($(".dd.nestable").data("output", $("#json-output")));

  editInputSlug.val("");
  editInputName.val("");
};

/***************************************/

/*************** Add ***************/

var newIdCount = 1;

$(".btn-primary").on("click", function () {
  var name = $(this)
    .parents(".fir_acc_item")
    .find("input:checked.items")
    .map(function () {
      var data = $(this).val();
      var slug = $(this).attr("data_slug");
      return slug + "|" + data;
    });

  var arr = name.get();

  for (item of arr) {
    var newId = "new-" + newIdCount;
    var newSlug = item.split("|")[0];
    var newName = item.split("|")[1];

    nestableList.append(
      '<li class="dd-item" ' +
        'data-id="' +
        newId +
        '" ' +
        'data-name="' +
        newName +
        '" ' +
        'data-slug="' +
        newSlug +
        '" ' +
        'data-new="1" ' +
        'data-deleted="0">' +
        '<div class="dd-handle">' +
        newName +
        "</div> " +
        '<span class="button-delete btn btn-default btn-xs pull-right" ' +
        'data-owner-id="' +
        newId +
        '"> ' +
        '<i class="fa fa-times-circle-o" aria-hidden="true"></i> ' +
        "</span>" +
        '<span class="button-edit btn btn-default btn-xs pull-right" ' +
        'data-owner-id="' +
        newId +
        '">' +
        '<i class="fa fa-pencil" aria-hidden="true"></i>' +
        "</span>" +
        "</li>"
    );

    newIdCount++;

    // update JSON
    // updateOutput($(".dd.nestable").data("output", $("#json-output")));

    $(this)
      .parents(".fir_acc_item")
      .find("input:checkbox")
      .not(this)
      .prop("checked", false);

    // set events
    $(".dd.nestable .button-delete").on("click", deleteFromMenu);
    $(".dd.nestable .button-edit").on("click", prepareEdit);
  }
});
var addToMenuByInputs = function () {
  var newName = $("#addInputName").val();
  var newSlug = $("#addInputSlug").val();
  var newId = "new-" + newIdCount;

  nestableList.append(
    '<li class="dd-item" ' +
      'data-id="' +
      newId +
      '" ' +
      'data-name="' +
      newName +
      '" ' +
      'data-slug="' +
      newSlug +
      '" ' +
      'data-new="1" ' +
      'data-deleted="0">' +
      '<div class="dd-handle">' +
      newName +
      "</div> " +
      '<span class="button-delete btn btn-default btn-xs pull-right" ' +
      'data-owner-id="' +
      newId +
      '"> ' +
      '<i class="fa fa-times-circle-o" aria-hidden="true"></i> ' +
      "</span>" +
      '<span class="button-edit btn btn-default btn-xs pull-right" ' +
      'data-owner-id="' +
      newId +
      '">' +
      '<i class="fa fa-pencil" aria-hidden="true"></i>' +
      "</span>" +
      "</li>"
  );

  newIdCount++;

  // update JSON
  // updateOutput($(".dd.nestable").data("output", $("#json-output")));

  $("#addInputName").val("");
  $("#addInputSlug").val("");
  // newSlug = "";
  // set events
  $(".dd.nestable .button-delete").on("click", deleteFromMenu);
  $(".dd.nestable .button-edit").on("click", prepareEdit);
};

/***************************************/

$(function () {
  // output initial serialised data
  // updateOutput($(".dd.nestable").data("output", $("#json-output")));

  // set onclick events
  editButton.on("click", editMenuItem);

  $(".dd.nestable .button-delete").on("click", deleteFromMenu);

  $(".dd.nestable .button-edit").on("click", prepareEdit);

  $(".menu-editor").submit(function (e) {
    e.preventDefault();
  });

  $("#menu-add").submit(function (e) {
    e.preventDefault();
    addToMenuByInputs();
  });
});

$(".fir_acc_item")
  .find(".checkAll")
  .click(function () {
    $(this)
      .parents(".first_tab")
      .find("input:checkbox.items")
      .not(this)
      .prop("checked", this.checked);
  });
