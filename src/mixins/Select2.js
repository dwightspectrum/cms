export const select2 = (selector) => {
    $(selector).select2();
};

export const renderSelect2 = (id) => {
    let pageSize = 10;
    let myOpts = document.getElementById(id).options;
    let items = Array.from(myOpts).map((e) => {
        return { id: e.value, text: e.innerHTML };
    });

    $.fn.select2.amd.require(["select2/data/array", "select2/utils"],

        function (ArrayData, Utils) {
            function CustomData($element, options) {
                CustomData.__super__.constructor.call(this, $element, options);
            }

            Utils.Extend(CustomData, ArrayData);
            CustomData.prototype.query = function (params, callback) {

                var results = [];
                if (params.term && params.term !== '') {
                    results = items.filter(function (e) {
                        return e.text.toUpperCase().indexOf(params.term.toUpperCase()) >= 0;
                    });
                } else {
                    results = items;
                }

                if (!("page" in params)) {
                    params.page = 1;
                }
                var data = {};
                data.results = results.slice((params.page - 1) * pageSize, params.page * pageSize);
                data.pagination = {};
                data.pagination.more = params.page * pageSize < results.length;
                callback(data);
            };

            $(document).ready(function () {
                $(`#${id}.select2`).select2({
                    ajax: {},
                    dataAdapter: CustomData
                });
            });
        })
}