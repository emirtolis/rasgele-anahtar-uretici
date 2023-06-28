function kopyala(){
    var metin = document.getElementById("metin");
    metin.select();
    document.execCommand("copy");
	alert ("Anahtar Pano'ya Kopyalandı")
}
