import React, { useEffect }  from 'react';
import ReactDOM from 'react-dom';
import Calendar from 'react-calendar'
import Modal from 'react-modal';
import AddFriend from './addFriend.js';
import GoogleGet from './googleGet.js';
import Information from './Infomation.js';
import Select from 'react-select';
import makeAnimated from 'react-select/animated';
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
    add: {
      textAlign: 'center',
      display: 'block',
      margin: '0 auto 1rem auto',
      width: '90%',
    },
    buttons: {
      paddingTop: '0.5rem',
      display: 'block',
      width: '100%',
      display: 'flex',
      justifyContent: 'space-around'
    },
    selectBox: {
      width: '100%',
      display: 'block',
      margin: '1.0rem'
    },
    userAdd: {
      display: 'block'
    },
    renew: {
      display: 'block'
    },
    goo: {
      width: '50%',
      margin: '30px auto 10px',
    },
    gooP: {
      fontWeight: 'bold',
      color: 'red'
    },
    google: {
      width: '100%',
      textAlign: 'center',

    }

};

Modal.setAppElement('#app');

function App() {
    const login_id = window.Laravel.id;
    let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;

    let subtitle;

    //state
    const [value, onChange] = React.useState(new Date());
    const [modalIsOpen, setIsOpen] = React.useState(false);  
    const [addFriend, setaddFriend] = React.useState(false);  
    const [googleGet, setgoogleGet] = React.useState(false);
    const [events, setEvents] = React.useState([]);  
    const [follows, setFollows] = React.useState([]);
    const [selectedOption, setSelectedOption] = React.useState(null);
    const [user_id, setUser_id] = React.useState([login_id]);
    
    //effect
    useEffect(async () => {
      const jsonEvents =  await axios.get("/event/get");
      const jsonFollows =  await axios.get("/follow/get");
      setEvents(jsonEvents.data);
      setFollows(jsonFollows.data);
    }, []);

    const animatedComponents = makeAnimated();

    //ユーザ選択
    const options = [];
    follows.map((val) => {
      var item = {};
      item.value = val.id;
      item.label = val.name;
      options.push(item);
    });

    //カレンダー更新
    const eventRenew = () => {
      const copy_user_id = user_id.slice(0, user_id.length);
      selectedOption.map((val) => {
        copy_user_id.push(val.value);  
      })
      setUser_id(copy_user_id);
    }

    //Modal関連
    function openModal() {
      setIsOpen(true);
    }

    function clickAddFriend(){
      setaddFriend(true);
      setIsOpen(true);  
    }

    function clickGoogleGet(){
      setgoogleGet(true);
      setIsOpen(true);  
    }
  
    function closeModal() {
      setIsOpen(false);
      setgoogleGet(false);
      setaddFriend(false);
    }

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
            { events.map((val) => (day === val.date && user_id.some(item => item == val.user_id)) ? <li className='day_event_content'>{val.user.name}</li> : '') }
          </ul>
        );
    };

    return (
        <div className="container">

          <div style={styles.add}>
            <Select
              isMulti
              defaultValue={selectedOption}
              onChange={setSelectedOption}
              closeMenuOnSelect={false}
              components={animatedComponents}
              options={options}
              style={styles.selectBox}
            />
            <div style={styles.buttons}>
              <button className="btn btn-primary button" style={styles.userAdd} onClick={clickAddFriend} >友達の追加</button>
              <button className="btn btn-warning button" style={styles.renew} type="submit" onClick={eventRenew}>更新</button>
            </div>
          </div>

          <div className="mx-auto">
              <Calendar 
              locale="ja-JP"
              className="mx-auto"
              onChange={onChange}
              value={value}
              onClickDay={openModal}
              tileContent={getTileContent}
              />

              <div style={styles.google}>
                <button className="btn btn-primary" style={styles.goo} type="submit" onClick={clickGoogleGet}>Google Calendarと連携</button>
                <p style={styles.gooP}>※Google Calendarの一般公開を設定した後、Google Cloud PlatformでのAPIキーの発行が必要となります。</p>
              </div>

          </div>
          <Modal
          onChange={onChange}
          isOpen={modalIsOpen}
          onRequestClose={closeModal}
          style={styles}
          contentLabel=""
          >

            {
              addFriend ? 
              <AddFriend csrf={csrf_token}/> : 
                 googleGet ? <GoogleGet csrf={csrf_token}/> : 
                <Information
                user_id={user_id}
                close={closeModal}
                csrf={csrf_token}
                login_id={login_id}
                date={info_date}
                value_day={value_day}
                data={events}
                />
            }
          
          </Modal>
        </div>
        
    );
}


export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}



