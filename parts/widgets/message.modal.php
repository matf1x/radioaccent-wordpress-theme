<dialog class="modal" id="sendMessageModal">

    <span class="closeButton" data-action="close-modal">X</span>

    <section id="entry" class="entry">
        <h2>Stuur een bericht</h2>
        <p>Wil jij iets kwijt aan onze presentatoren? Vul onderstaand formulier in en stuur jouw bericht.</p>

        <p class="error" id="errorMessage"></p>

        <form class="form" id="messageForm">

            <div class="input-box">
                <label>Uw naam: <span>*</span></label>
                <input type="text" required placeholder="Vul je naam in" name="inputFullName" id="inputFullName">
                <small></small>
            </div>

            <div class="input-box">
                <label>Uw emailadres: </label>
                <input type="email" placeholder="Vul je emailadres in" name="inputMail" id="inputMail" style="padding-right: 38px;">
                <small></small>
            </div>

            <div class="input-box">
                <label>Uw telefoonnummer: </label>
                <input type="tel" placeholder="Vul je telefoonnummer in" name="inputphone" id="inputPhone">
                <small></small>
            </div>

            <div class="input-box">
                <label>Uw bericht: <span>*</span></label>
                <input type="text" required placeholder="Vul je bericht in" name="inputMessage" id="inputMessage">
                <small></small>
            </div>

            <div class="buttons">
                <button type="submit" class="submit" id="submitMessage">Verstuur bericht</button> <button type="reset">Annuleren</button>
            </div>

        </form>
    </section>

    <section id="complete" class="complete">
        
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>

        <h2>Het bericht is succesvol verstuurd</h2>
        <p>Je bericht heeft de studio bereikt. Je kan nu dit venster afsluiten.</p>

        <div class="buttons">
            <button type="button" data-action="close-modal">Sluiten</button>
        </div>
        
    </section>
    
</dialog>