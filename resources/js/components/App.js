import React, { useState }  from 'react';
import ReactDOM from 'react-dom';
import Calendar from 'react-calendar'
import Modal from 'react-modal';
import Infomation from './Infomation';
import 'react-calendar/dist/Calendar.css';

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
};

var events = [
    {
        name: 'トム',
        title: 'バイト',
        date: '20210911',
        time: '17'
    },
    {
        name: 'マイク',
        title: 'ドライブ',
        date: '20210924',
        time: '14'
    },
    {
        name: 'トム',
        title: '飲み会',
        date: '20210922',
        time: '17'
    },
    {
        name: 'ジェシー',
        title: '飲み会',
        date: '20210922',
        time: '17'
    }
];

Modal.setAppElement('#app');

function App() {
    let subtitle;
    const [modalIsOpen, setIsOpen] = React.useState(false);  

    function openModal() {
      setIsOpen(true);
    }
  
    function afterOpenModal() {
      // references are now sync'd and can be accessed.
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
          <p >
            <br />
            { events.map((val) => (day === val.date) ? val.name+' ' : '') }
          </p>
        );
    };

    return (
        <div>
            <div className="container">
                <div className="m-auto">
                    <Calendar 
                    onChange={onChange}
                    value={value}
                    onClickDay={openModal}
                    tileContent={getTileContent}
                    />

                </div>
                <button onClick={openModal}>Open Modal</button>
                <Modal
                onChange={onChange}
                isOpen={modalIsOpen}
                onAfterOpen={afterOpenModal}
                onRequestClose={closeModal}
                style={styles}
                contentLabel="Example Modal"
                >
                    
                    <Infomation
                    date={info_date}
                    value_day={value_day}
                    data={events}
                    />
                    
                </Modal>
            </div>
            
        </div>
    );
}


export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}

