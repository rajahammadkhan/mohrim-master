<script>

    jQuery(document).ready(function ($) {

        $("#hideCreateMenu").click(function(){
            $("#createMenuMain").slideUp();
        });
        $("#showCreateMenu").click(function(){
            $("#createMenuMain").slideDown();
        });

        let updateOutput = function (e) {
            let list = e.length ? e : $(e.target),
                output = list.data("output");

            if (window.JSON) {
                if (output) {
                    output.val(window.JSON.stringify(list.nestable("serialize")));
                    var arrLen = JSON.parse(output.val()).length;
                    if (arrLen < 1) {
                        $(".dd-list").append('<p class="noItemsFound mb-0">No Items Found!</p>');
                    } else {
                        $(".noItemsFound").css("display", "none")
                    }
                }
            } else {
                alert("JSON browser support required for this page.");
            }
        };

        let nestableList = $(".dd.nestable > .dd-list");

        let deleteFromMenuHelper = function (target) {
            if (target.data("new") == 1) {

                target.fadeOut(function () {
                    target.remove();
                    updateOutput($(".dd.nestable").data("output", $("#json-output")));
                });
            } else {

                target.appendTo(nestableList);

                target.data("deleted", "1");
                target.fadeOut();
            }
        };

        let deleteFromMenu = function () {
            let targetId = $(this).data("owner-id");
            let target = $('[data-id="' + targetId + '"]');

            // let result = confirm(
            //   "Delete " + target.data("name") + " and all its subitems ?"
            // );
            // if (!result) {
            //   return;
            // }


            target.find("li").each(function () {
                deleteFromMenuHelper($(this));
            });


            deleteFromMenuHelper(target);


            updateOutput($(".dd.nestable").data("output", $("#json-output")));
            return;
        };

        let menuEditor = $(".menu-editor");
        let editButton = $(".editButton");
        let editInputName = $(".editInputName");
        let editInputSlug = $(".editInputSlug");
        let currentEditName = $(".currentEditName");
        let prepareEdit = function () {
            let targetId = $(this).data("owner-id");
            let target = $('[data-id="' + targetId + '"]');

            editInputName.val(target.data("name"));
            editInputSlug.val(target.data("slug"));
            currentEditName.html(target.data("name"));
            editButton.data("owner-id", target.data("id"));
            menuEditor.fadeIn();
        }
        let editMenuItem = function () {
            let targetId = $(this).data("owner-id");
            let target = $('[data-id="' + targetId + '"]');

            let newName = editInputName.val();
            let newSlug = editInputSlug.val();

            target.data("name", newName);
            target.data("slug", newSlug);

            target.find("> .dd-handle").html(newName);

            menuEditor.fadeOut();


            updateOutput($(".dd.nestable").data("output", $("#json-output")));

            editInputSlug.val("");
            editInputName.val("");
        };
        let newIdCount = 1;
        $(".btn-primary").on("click", function () {
            let name = $(this)
                .parents(".fir_acc_item")
                .find("input:checked.items")
                .map(function () {
                    let data = $(this).val();
                    let slug = $(this).attr("data_slug");
                    return slug + "|" + data;
                });

            let arr = name.get();

            for (item of arr) {
                let newId = "new-" + newIdCount;
                let newSlug = item.split("|")[0];
                let newName = item.split("|")[1];

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
                    '<span class="button-delete btn btn-default btn-xs pull-right"' +
                    'data-owner-id="' +
                    newId +
                    '"> ' +
                    ' <i class="material-icons"> delete </i>' +
                    "</span>" +
                    '<span class="button-edit btn btn-default btn-xs pull-right"' +
                    'data-owner-id="' +
                    newId +
                    '">' +
                    ' <i class="material-icons"> edit </i>' +
                    "</span>" +
                    "</li>"
                );

                newIdCount++;


                updateOutput($(".dd.nestable").data("output", $("#json-output")));

                $(this)
                    .parents(".fir_acc_item")
                    .find("input:checkbox")
                    .not(this)
                    .prop("checked", false);


                $(".dd.nestable .button-delete").on("click", deleteFromMenu);
                $(".dd.nestable .button-edit").on("click", prepareEdit);
            }
        });
        let addToMenuByInputs = function () {
            let newName = $("#addInputName").val();
            let newSlug = $("#addInputSlug").val();
            let newId = "new-" + newIdCount;

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
                '<span class="button-delete btn btn-default btn-xs pull-right"' +
                'data-owner-id="' +
                newId +
                '"> ' +
                ' <i class="material-icons"> delete </i>' +
                "</span>" +
                '<span class="button-edit btn btn-default btn-xs pull-right"' +
                'data-owner-id="' +
                newId +
                '">' +
                ' <i class="material-icons"> edit </i>' +
                "</span>" +
                "</li>"
            );

            newIdCount++;


            updateOutput($(".dd.nestable").data("output", $("#json-output")));

            $("#addInputName").val("");
            $("#addInputSlug").val("");

            $(".dd.nestable .button-delete").on("click", deleteFromMenu);
            $(".dd.nestable .button-edit").on("click", prepareEdit);
        };
        $(function () {

            updateOutput($(".dd.nestable").data("output", $("#json-output")));


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
        $('.dd.nestable').nestable({
            maxDepth: 5
        })
            .on('change', updateOutput);
    });


</script>
