class CalendarEvent {
    #id;
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
    
    index = 0;

    constructor (event, index=0){
        this.#id = event.id;
        this.#title = event.title;
        this.#startDate = event.startDate;
        this.#endDate = (event.endDate == null) ? this.#startDate : event.endDate;
        this.index = index;
    }

    get fullCalendarEvent(){
        return {
            className: 'id-' + this.index,
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
    
    get id(){
        return this.#id;
    }
}

function toEvent(event){
}