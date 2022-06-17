function redirect(evt,targetLanguage) {
    baseUrl="";
    document.cookie = baseUrl.concat("lang=",targetLanguage);
    /*actualUrl = window.location.pathname.slice(14);
    targetUrl=baseUrl.concat('/Smart-Care',targetLanguage,actualUrl);
    document.write(targetUrl);
    location.replace(targetUrl);
    */
    location.reload();
}
