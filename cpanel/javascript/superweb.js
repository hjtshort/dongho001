if (typeof superweb === "undefined") superweb = {};
superweb.utility = {
    toolbar: function () {

        $('.btn_submit').click(function (e) {

            var self = $(this);

            if (self.data("action") == "lock-all") {

                if ($(".chkItem:checked").length <= 0) {
                    bootbox.alert("Vui lòng chọn mục cần khóa !", function (result) {
                    });
                } else {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }

            } else if (self.data("action") == "unlock-all") {

                if ($(".chkItem:checked").length <= 0) {
                    bootbox.alert("Vui lòng chọn mục cần mở khóa !", function (result) {
                    });
                } else {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }

            } else if (self.data("action") == "delete-all") {

                if ($(".chkItem:checked").length <= 0) {
                    bootbox.alert("Vui lòng chọn mục cần xoá !", function (result) {
                    });
                } else {
                    bootbox.confirm("Bạn có chắc chắn xoá các bản tin được chọn hay không !", function (result) {
                        if (result) {
                            $("#act").val(self.data("action"));
                            $("#validateSubmitForm").submit();
                        }
                    });
                }

            } else if (self.data("action") == "delete") {

                $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody tr.selectable').removeClass('selected');

                $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');

                bootbox.confirm("Bạn có chắc chắn xoá các bản tin được chọn hay không !", function (result) {
                    if (result) {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();
                    }
                });

            } else if (self.data("action") == "lock") {

                $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody tr.selectable').removeClass('selected');

                $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');

                $("#act").val(self.data("action"));
                $("#validateSubmitForm").submit();

            } else if (self.data("action") == "unlock") {

                $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                $('.checkboxs tbody tr.selectable').removeClass('selected');

                $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');

                $("#act").val(self.data("action"));
                $("#validateSubmitForm").submit();

            } else if (self.data("action") == "add") {
                location.href = self.data("link");
            } else if (self.data("action") == "edit") {
                location.href = self.data("link");
            } else if (self.data("action") == "search") {
                var dateRangeFrom = $("#dateRangeFrom").val();
                var dateRangeTo = $("#dateRangeTo").val();
                var searchinput = $("#searchinput").val();
                var parent_category = $("#parent_category").val();
                location.href = self.data("link") + "search=" + dateRangeFrom + "|" + dateRangeTo + "|" + searchinput + "|" + parent_category;
            } else if (self.data("action") == "un-filter") {
                location.href = self.data("link");
            } else if (self.data("action") == "sort") {
                $("#act").val(self.data("action"));
                $("#validateSubmitForm").submit();
            }
        });

    }
};
