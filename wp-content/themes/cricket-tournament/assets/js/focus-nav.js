( function( window, document ) {
  function cricket_tournament_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const cricket_tournament_nav = document.querySelector( '.sidenav' );
      if ( ! cricket_tournament_nav || ! cricket_tournament_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...cricket_tournament_nav.querySelectorAll( 'input, a, button' )],
        cricket_tournament_lastEl = elements[ elements.length - 1 ],
        cricket_tournament_firstEl = elements[0],
        cricket_tournament_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && cricket_tournament_lastEl === cricket_tournament_activeEl ) {
        e.preventDefault();
        cricket_tournament_firstEl.focus();
      }
      if ( shiftKey && tabKey && cricket_tournament_firstEl === cricket_tournament_activeEl ) {
        e.preventDefault();
        cricket_tournament_lastEl.focus();
      }
    } );
  }
  cricket_tournament_keepFocusInMenu();
} )( window, document );