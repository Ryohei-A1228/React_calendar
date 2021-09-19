import React, { useState,useEffect }  from 'react';
import ReactDOM from 'react-dom';
import Calendar from 'react-calendar'
import Modal from 'react-modal';
import Infomation from './Infomation';
import axios from 'axios';
import 'react-calendar/dist/Calendar.css';
import './App.css';
import './Modal.css';


const styles = {
    content: {
        minWidth: '300px',
        width: '50%',
        position: 'absolute',
        top: '50%',
        left: '50%',
        right: 'auto',
        bottom: 'auto',
        transform: 'translate(-50%, -50%)',
    },
    calendar:{
      border: '1px solid #a0a096;'
    },
    ul: {
      listStyleType: 'none',
      paddingLeft: '0'
    },

};

Modal.setAppElement('#app');

function App() {
    let subtitle;
    //state
    const [modalIsOpen, setIsOpen] = React.useState(false);  
    const [events, setEvents] = React.useState([]);  
    
    //effect
    useEffect(async () => {
      const json =  await axios.get("/event/get")
      setEvents(json.data);
    }, []);

    const login_id = window.Laravel.id;

    let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;

    function openModal() {
      setIsOpen(true);
    }
  
    function afterOpenModal() {
      subtitle.style.color = '#f00';
    }
  
    function closeModal() {
      setIsOpen(false);
    }
    const [value, onChange] = useState(new Date());

    var info_date = value.getFullYear()+'-'+('0' + (value.getMonth() + 1)).slice(-2)+'-'+('0' + value.getDate()).slice(-2);

    const getFormatDate = (date) => {
        return `${date.getFullYear()}${('0' + (date.getMonth() + 1)).slice(-2)}${('0' + date.getDate()).slice(-2)}`;
    };

    var value_day = getFormatDate(value);

    const getTileContent = (props) => {
        if (props.view !== "month") {
          return null;
        }
        const day = getFormatDate(props.date);
        return (
          <ul style={styles.ul}>
            <br/>
            { events.map((val) => (day === val.date) ? <li className='day_event_content'>{val.user.name}</li> : '') }
          </ul>
        );
    };

    return (
        <div className="container">
          <div className="mx-auto">
              <Calendar 
              locale="ja-JP"

              className="mx-auto"
              onChange={onChange}
              value={value}
              onClickDay={openModal}
              tileContent={getTileContent}
              />

          </div>
          <Modal
          onChange={onChange}
          isOpen={modalIsOpen}
          onAfterOpen={afterOpenModal}
          onRequestClose={closeModal}
          style={styles}
          contentLabel=""
          >
            <addFriend />
              {/* <Infomation
              <Infomation
              csrf={csrf_token}
              login_id={login_id}

              date={info_date}
              value_day={value_day}
å              data={events}
              /> */}
              
          </Modal>
        </div>
        
    );
}


export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}



