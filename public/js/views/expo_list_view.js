
/**
 * Expo List View
 * The DOM element for a list of expo items.
 */

var ExpoListView = Backbone.View.extend({

    el:  $("#companies_holder"),

    initialize: function(options) {
      this.map = options.map;
      this.model.on('add', this.added_expo, this);

      // initialize position
      this.$el.css({display: 'none', right:'20px', top: '120px'}, 2000);
      this.$el.fadeIn('500');

      _.bindAll(this, 'render');
      this.collection = new ExpoList();
      this.render();
    },

    //----------------------------------
    // Events and event handlers

    events: {
    },


    // END Events and event handlers
    //----------------------------------

    added_expo : function(expo){
      var marker_view = new ExpoMarkerView({ model: expo, map: this.map });
      var item_view = new ExpoListItemView({ model: expo, marker_view : marker_view });
      $(this.list_container).append(item_view.render().el);
    },

    // Fetch and Render each Expos
    //----------------------------------
    render: function() {
      var self = this;
        this.collection.fetch({
            success: function(response) {
              response.models.forEach(function(item){
                Expos.add_new(item.attributes);
              });
            },
            error: function() {
                console.log('Failed to fetch!');
            }
        });
    }
});
