
var dummy_data_generator = {

  'reset' : function() {
    Expos.remove_all();
  },

  'get_dummy_expo': function() {
    var rnd_id = (new Date).getTime();
    var expo = {
      expo_id : rnd_id,
      name : Faker.Expo.expoName(),
      date : '2017-12-31 12:00:07',
      address: Faker.Address.streetAddress(),
      pos: {lat: 41 + Math.random(), lon: 29 + Math.random()}
    };

    expo.descr = '<div>'+
    '<div>'+
    '</div>'+
    '<h2>' + expo.name + ' <small>' + expo.address +  '</small></h2>'+
    '<div>'+
    '<img style="width:200px;height:200px;float:left;margin:5px 10px 5px 0px" src="http://lorempixel.com/200/200/" />' +
    '<p>' + Faker.Lorem.paragraph() + '</p>' +
    '<p>' + Faker.Lorem.paragraph() + '</p>' +
    '<p>' + Faker.Lorem.paragraph() + '</p>' +
    '</div>'+
    '</div>';

    return expo;
  },

  'repopulate' : function() {
    Expos.remove_all();
    for (var i = 0, l = 10; i < l ;  i++) {
      Expos.add_new(this.get_dummy_expo());
    }
  }
};

dummy_data_generator.repopulate();
