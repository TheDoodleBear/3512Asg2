document.addEventListener("DOMContentLoaded", function() {

    toggleBtnBox();

})

function toggleBtnBox() {
    document.querySelector("#pButtons").addEventListener("click", function(e) {
        if (e.target && e.target.nodeName.toLowerCase() == "button") {
            if (e.target.matches(".btnDet")) {
                document.querySelector(".btnDet").classList.add("btnSelected");
                document.querySelector(".pDet").classList.add("btnSelected");

                document.querySelector(".btnDesc").classList.remove("btnSelected");
                document.querySelector(".btnColr").classList.remove("btnSelected");
                document.querySelector(".pDesc").classList.remove("btnSelected");
                document.querySelector(".pColr").classList.remove("btnSelected");
            } else if (e.target.matches(".btnDesc")) {
                document.querySelector(".btnDesc").classList.add("btnSelected");
                document.querySelector(".pDesc").classList.add("btnSelected");

                document.querySelector(".btnDet").classList.remove("btnSelected");
                document.querySelector(".btnColr").classList.remove("btnSelected");
                document.querySelector(".pDet").classList.remove("btnSelected");
                document.querySelector(".pColr").classList.remove("btnSelected");
            } else if (e.target.matches(".btnColr")) {
                document.querySelector(".btnColr").classList.add("btnSelected");
                document.querySelector(".pColr").classList.add("btnSelected");

                document.querySelector(".btnDesc").classList.remove("btnSelected");
                document.querySelector(".btnDet").classList.remove("btnSelected");
                document.querySelector(".pDesc").classList.remove("btnSelected");
                document.querySelector(".pDet").classList.remove("btnSelected");
            }
        }
    })
}