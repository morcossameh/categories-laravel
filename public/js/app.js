function checkCategory(obj) {
    const id = $(obj)[0].id;
    if ($(obj).is(":checked")) {
        const currentLevel = parseInt($(obj)[0].attributes[0].value) + 1;
        $.ajax({
            type: "get",
            url: "/categories/" + id,
            success: function (data) {
                const tab = "&nbsp&nbsp".repeat(currentLevel);
                for (const element of data) {
                    $("#div" + id).append(`
                        <div id="div${element.id}">
                            ${tab}
                            <input
                                level="${currentLevel}"
                                type="checkbox"
                                id="${element.id}"
                                onchange="checkCategory(this)"
                            >
                            <label for="${element.id}">${element.name}</label>
                            <br>
                        </div>
                    `);
                }
            },
        });
    } else {
        $("#div" + id)
            .find("div")
            .remove();
    }
}
