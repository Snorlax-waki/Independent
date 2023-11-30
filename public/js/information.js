$('.auto-link').each(function (idx, elem) {
    let str = $(elem).html();
    let regexp_url = /((h?)(ttps?:\/\/[a-zA-Z0-9.\-_@:/~?%&;=+#',()*!]+))/g;
    let regexp_makeLink = function(all, url, h, href) {
      return '<a href="h' + href + '" target="_blank">' + url + '</a>';
    }
    let textWithLink = str.replace(regexp_url, regexp_makeLink);
    $(elem).html(textWithLink);
  });