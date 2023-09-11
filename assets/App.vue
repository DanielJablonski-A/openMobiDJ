<template>
    <div>
        <div class="container-fluid welcome-section">
            <div class="text-center welcome-text">
                Witaj w mikroserwisie kalkulatora!
                <div class="container mt-5">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Funkcja</th>
                                <th>Link</th>
                                <th>Liczba 1</th>
                                <th>Liczba 2</th>
                                <th>Przycisk</th>
                                <th>Wynik</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dodawanie</td>
                                <td><input v-model="addLink" type="text" class="my-calculator-link-style" disabled="true"></td>
                                <td><input @keyup="addInput1KeyUp" v-model="addInput1" type="text" class="form-control my-calculator-input-style"></td>
                                <td><input @keyup="addInput2KeyUp" v-model="addInput2" type="text" class="form-control my-calculator-input-style"></td>
                                <td><button @click="addHandleClick" class="btn btn-primary">Oblicz</button></td>
                                <td ref="addResult"></td>
                            </tr>
                            <tr>
                                <td>Odejmowanie</td>
                                <td><input v-model="substractLink" type="text" class="my-calculator-link-style" disabled="true"></td>
                                <td><input @keyup="substractInput1KeyUp" v-model="substractInput1" type="text" class="form-control my-calculator-input-style"></td>
                                <td><input @keyup="substractInput2KeyUp" v-model="substractInput2" type="text" class="form-control my-calculator-input-style"></td>
                                <td><button @click="substractHandleClick" class="btn btn-primary">Oblicz</button></td>
                                <td ref="substractResult"></td>
                                
                            </tr>
                            <tr>
                                <td>Mnożenie</td>
                                <td><input v-model="multiplyLink" type="text" class="my-calculator-link-style" disabled="true"></td>
                                <td><input @keyup="multiplyInput1KeyUp" v-model="multiplyInput1" type="text" class="form-control my-calculator-input-style"></td>
                                <td><input @keyup="multiplyInput2KeyUp" v-model="multiplyInput2" type="text" class="form-control my-calculator-input-style"></td>
                                <td><button @click="multiplyHandleClick" class="btn btn-primary">Oblicz</button></td>
                                <td ref="multiplyResult"></td>
                            </tr>
                            <tr>
                                <td>Dzielenie</td>
                                <td><input v-model="divideLink" type="text" class="my-calculator-link-style" disabled="true"></td>
                                <td><input @keyup="divideInput1KeyUp" v-model="divideInput1" type="text" class="form-control my-calculator-input-style"></td>
                                <td><input @keyup="divideInput2KeyUp" v-model="divideInput2" type="text" class="form-control my-calculator-input-style"></td>
                                <td><button @click="divideHandleClick" class="btn btn-primary">Oblicz</button></td>
                                <td ref="divideResult"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'App',
    data() {
      return {
        addLink: '/api/add/150/20',
        addInput1: 150,
        addInput2: 50,

        substractLink: '/api/substract/150/20',
        substractInput1: 150,
        substractInput2: 50,

        multiplyLink: '/api/multiply/150/20',
        multiplyInput1: 150,
        multiplyInput2: 50,

        divideLink: '/api/divide/150/20',
        divideInput1: 150,
        divideInput2: 50

      }
    },
    methods: {
      addInput1KeyUp(event) {
        this.addLink = '/api/add/'+this.addInput1+'/'+this.addInput2
      },
      addInput2KeyUp(event) {
        this.addLink = '/api/add/'+this.addInput1+'/'+this.addInput2
      },

      substractInput1KeyUp(event) {
        this.substractLink = '/api/substract/'+this.substractInput1+'/'+this.substractInput2
      },
      substractInput2KeyUp(event) {
        this.substractLink = '/api/substract/'+this.substractInput1+'/'+this.substractInput2
      },

      multiplyInput1KeyUp(event) {
        this.multiplyLink = '/api/multiply/'+this.multiplyInput1+'/'+this.multiplyInput2
      },
      multiplyInput2KeyUp(event) {
        this.multiplyLink = '/api/multiply/'+this.multiplyInput1+'/'+this.multiplyInput2
      },

      divideInput1KeyUp(event) {
        this.divideLink = '/api/divide/'+this.divideInput1+'/'+this.divideInput2
      },
      divideInput2KeyUp(event) {
        this.divideLink = '/api/divide/'+this.divideInput1+'/'+this.divideInput2
      },
      
      addHandleClick() {
        fetch(this.addLink)
            .then(response => response.json())
            .then(data => {
                this.$refs.addResult.innerText = data.result;
            });
        //window.open(this.addLink, '_blank');
      },

      substractHandleClick() {
        fetch(this.substractLink)
            .then(response => response.json())
            .then(data => {
                this.$refs.substractResult.innerText = data.result;
            });
      },

      multiplyHandleClick() {
        fetch(this.multiplyLink)
            .then(response => response.json())
            .then(data => {
                this.$refs.multiplyResult.innerText = data.result;
            });
      },

      divideHandleClick() {
        fetch(this.divideLink)
            .then(response => response.json())
            .then(data => {
                this.$refs.divideResult.innerText = data.result;
            });
      },

  }
  }
  </script>
  