import {getData, setData} from './dataStore.js'

function click1() {
    getData()
    .then(jsonData => {
        let data = JSON.parse(jsonData);
        const a = document.getElementById('input1').value;
        const b = document.getElementById('input2').value;
        let exist = data.number;

        let newNumber = exist + parseInt(a) + parseInt(b);
        data.number = newNumber;
        setData(data);      
    })
    .catch(error => {
      console.error('Error:', error);
    });

}

function click2() {
    getData()
    .then(jsonData => {
      document.getElementById('iniLabel').textContent=`Nilai tersimpan: ${JSON.parse(jsonData).number}` 
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

document.getElementById('submitButton').addEventListener('click', click1);
document.getElementById('getButton').addEventListener('click', click2);