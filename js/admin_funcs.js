var menuItems, contentOp;

function logout(){
	$.ajax({
		type: 'POST',
		url: 'core/php/funcs/admin/logout.php',
		success: function (){
			window.location.href = "";
		}
	});
}

function adChangePW() {
	$.ajax({
		type: 'POST',
		url: 'core/php/funcs/admin/pw_update.php',
		data: $("#admin_changepass_form").serialize(),
		success: function (data) {
			document.getElementById('admin_changepass_form').reset();
			$("#mensajes").html(data);
		}
	});
}
window.onload = function (){
    contentOp = document.getElementById('op');
    menuItems = document.getElementsByClassName("dropdown-item");
    Array.from(menuItems).forEach(function(dom){
        if (dom.getAttribute("target") === "logout") {
            dom.addEventListener("click", function(){
                logout();
            });
        } else {
            dom.addEventListener("click", function(){
                contentOp.setAttribute("w3-include-html","layout/" + dom.getAttribute("target"));
                w3.includeHTML();
            });
        }
    });

    contentOp.setAttribute("w3-include-html", "layout/admin_home.php");
    w3.includeHTML();
};
