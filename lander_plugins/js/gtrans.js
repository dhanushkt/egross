$(function(){
  
  var $translateBar = $('#translate-a'),
      $translateToggle = $('.translate-toggle'),
      $picker = $translateBar.find('select'),
      visibleClass = "visible",
      hideOnChange = true; // hide bar after choice

      $translateToggle.on('click', function(e){
        e.preventDefault();
        $translateBar.toggleClass(visibleClass);
      });
  
      if(hideOnChange){
        $translateBar.on('change', 'select', function(){
          if($translateBar.hasClass(visibleClass)){
            $translateBar.removeClass(visibleClass);
          }
        });
      }
  
});


function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    autoDisplay: false,
    includedLanguages: 'en,kn',
    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
  }, 'google_translate_element');

}