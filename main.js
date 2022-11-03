let formEvent = document.getElementById('formEvent');
let buttonCloseModal = document.getElementById('closeModal');
const myModal = new bootstrap.Modal(document.getElementById('saveEvent'), {});

document.addEventListener('DOMContentLoaded', function () {
  formEvent.addEventListener('submit', saveEvent);
  buttonCloseModal.addEventListener('click', closeModal);

  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [{
      //   title: 'event1',
      //   start: '2022-10-01'
      // },
    }
    ],
    eventClick: function (info) {
      event.preventDefault();
      alert(`Evento: ${info.event.title}\nFecha: ${new Date(info.event.startStr).toISOString().slice(0, 10)}\nUrl: ${info.event.url === '' ? 'sin url' : info.event.url}`
      );
      // change the border color just for fun
      info.el.style.borderColor = 'red';
    }
  });

  // calendar.addEvent({
  //   title: 'event4',
  //   start: '2022-10-05',
  // });

  calendar.on('dateClick', function (info) {
    clickEvent(info);
  });

  calendar.render();
  getAllEvents();

  function getAllEvents() {
    const options = {
      method: 'GET',
    };
    fetch('http://localhost/agenda_web/api/index.php?q=all', options)
      .then(response => response.json())
      .then(response => {
        if (response.status) {
          for (const event of response.data) {
            addCardEvent(event);
          }
        } else {
          alert('Listado no disponible.')
        }
      })
      .catch(err => console.error(err));
  }

  function clickEvent(info) {
    myModal.show();
    displayModal(info.dateStr);
  }

  function closeModal() {
    myModal.hide();
    formEvent.reset();
    const timeout = setTimeout(() => {
      let modal = document.querySelector('.modal-backdrop');
      modal.remove();
      clearTimeout(timeout);
    }, 500);
  }

  function saveEvent(e) {
    e.preventDefault();
    let dateInput = document.getElementById('dateEventInput');
    let data = new FormData(formEvent);
    let objEvent = {
      title: data.get('nameEvent'),
      date: dateInput.value,
      url: data.get('urlEvent')
    };

    const options = {
      method: 'POST',
      body: new URLSearchParams(objEvent)
    };

    fetch('http://localhost/agenda_web/api/index.php?q=save', options)
      .then(response => response.json())
      .then(response => {
        if (response.status) {
          addCardEvent(response.data);
          closeModal();
        } else {
          alert('Producto no guardado.')
        }
      })
      .catch(err => console.error(err));
  }

  function addCardEvent(event) {
    calendar.addEvent({
      title: event.title,
      start: event.date,
      url: event.url ?? '',
    });

  }
  
  function displayModal(date) {
    let elDate = document.getElementById('dateEvent');
    let inputDate = document.getElementById('dateEventInput');
    elDate.innerText = new Date(date).toISOString().slice(0, 10);
    inputDate.value = date;
    const myModal = new bootstrap.Modal(document.getElementById('saveEvent'), {});
    myModal.show();
  }

});