class CalendarEvent {
    #className;
    #title;
    #startDate;
    #endDate;
    #options = [
        "Apple",
        "Google",
        "iCal",
        "Microsoft365",
        "MicrosoftTeams",
        "Outlook.com",
        "Yahoo"
    ];
    #timeZone = 'Asia/Dubai'; 


    constructor (event){
        this.#className = event.id;
        this.#title = event.title;
        this.#startDate = event.startDate;
        this.#endDate = (event.endDate == null) ? this.#startDate : event.endDate;
    }

    get fullCalendarEvent(){
        return {
            className: 'id-' + this.#className,
            title: this.#title,
            start: this.#startDate,
            end: this.#endDate,
        };
    }

    get eventConfig(){
        return {
            "name": this.#title,
            // "description":"Check out the maybe easiest way to include add-to-calendar-buttons to your website at:<br>→ [url]https://github.com/jekuer/add-to-calendar-button[/url]",
            "startDate": this.#startDate,
            "endDate": this.#endDate,
            // "startTime":"10:15",
            // "endTime":"23:30",
            // "location":"World Wide Web",
            "options": this.#options,
            "timeZone": this.#timeZone,
            "iCalFileName":"Reminder-Event"
          }
    }
}

function toEvent(event){
}