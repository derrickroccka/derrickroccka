(function(){  // whole blocked is wrapped into anonymous Jquery function..


/*===================================
=            GLOBAL VARS            =
===================================*/
			
var serverUrl = 'http://192.168.1.36/derrickroccka/';
	
/*-----  End of GLOBAL VARS  ------*/

/*=============================================
=            GLOBAL FUNCTIONS            =
=============================================*/
	
window.template = function(id){
    return _.template( $('#' + id).html());
};
	
/*-----  End of GLOBAL FUNCTIONS  ------*/
		
/*================================================
=            APP STRUCTURE DEFINITION            =
================================================*/

window.App = {   // defining app name space, You can rename it as per your project name..
    Models: {},
    Collections: {},
    Views: {},
    Router: {}
};

/*-----  End of APP STRUCTURE DEFINITION  ------*/

/*==============================
=            MODELS            =
==============================*/

// Project Model
App.Models.Project = Backbone.Model.extend({   // Person model referencing the App namespace model.
    defaults: {
        name: '',
        progress: 100,
        tech: '',
        type: '',
        cat: '',
        url: ''
    },
    urlRoot: serverUrl + 'projects'
});

// Projects item filter Model
App.Models.ProjectsItemFilter = Backbone.Model.extend({   // Person model referencing the App namespace model.
    defaults: {
        dataHref: 'wapp',
        name: 'Web app dev'
    }
});

// An element of a form (for example; input of text)
App.Models.FormItem = Backbone.Model.extend({   // Person model referencing the App namespace model.
    defaults: {
        item: 'input',
        name: '',
        placeholder: '',
        type: 'text',
        size: '140',
        maxlength: '140',
        value: ''
    }
    
});

/*-----  End of MODELS  ------*/


/*===================================
=            COLLECTIONS            =
===================================*/

// Project Collection
App.Collections.Projects = Backbone.Collection.extend({
    model: App.Models.Project,
    url: serverUrl + 'projects'
});

// Projects Item Filter Collection
App.Collections.ProjectsItemFilterCollection = Backbone.Collection.extend({
    model: App.Models.ProjectsItemFilter
});

// Form Collection
App.Collections.HireForm = Backbone.Collection.extend({
    model: App.Models.FormItem,
});

/*-----  End of COLLECTIONS  ------*/

/*==============================
=            VIEWS            =
==============================*/

/**
* Projects views
*/

// Project collection view
App.Views.Projects = Backbone.View.extend({
    tagName: 'ul',
    id: 'projects',
    initialize: function(){
        //this.collection.on('add', this.addOne, this);  // listeners/anouncers for the collection on add..
    },
    render: function(){
        this.collection.each(this.addOne, this);
        return this;
    },
    // called from render method of collection view..
    addOne: function(project){
        var projectView = new App.Views.Project({ model: project });
        this.$el.append(projectView.render().el);
    },
});

// Single Project view
App.Views.Project = Backbone.View.extend({
    tagName: 'li',
    className: 'project-name',
    events: {
        'click' : 'showProject'
    },
    template: template('projectTemplate'),
    templateShow: template('projectShowTemplate'),
    render: function(){
        $(this.el).addClass('projects-item ' + this.model.get('type')); //adding projects-item class and a class related to it's type (example: wapp (Web App))
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
    showProject: function (){
        $('#projects-info, #projects-instructions').remove();
        $('#projects-container').append(this.templateShow(this.model.toJSON()));
        $('#projects-info').hide();
        $('#projects-info').slideDown(500);
    }
});

/**
* Project filter views
*/

// Projects Item Filter Collection view
App.Views.ProjectsItemFilterCollection = Backbone.View.extend({
    tagName: 'ul',
    id: 'projects-filter',
    render: function(){
        this.collection.each(this.addOne, this);
        return this;
    },
    // called from render method of collection view..
    addOne: function(projectsItemFilter){
        var projectsFilterView = new App.Views.ProjectsItemFilter({ model: projectsItemFilter });
        this.$el.append(projectsFilterView.render().el);
    }

});

// Single Projects Item Filter view
App.Views.ProjectsItemFilter = Backbone.View.extend({
    tagName: 'li',
    className: 'projects-item-filter',
    attributes: function() {
      return {
        'data-attr': this.model.get('dataHref'),
        'id': this.model.get('id')
      };
    },
    events: {
        'click' : 'filterItems'
    },
    template: template('projectsFilterTemplate'),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));//duda: this.model
        return this;
    },
    filterItems: function (events){
        var type = this.model.get('dataHref');
        $(".projects-item").each(function (i) {
            if ( $(this).hasClass(type) ) {
              $(this).fadeTo('slow', 1);
            }
            else if(type=='all'){
              $(this).fadeTo('slow', 1);
            }
            else {
              $(this).fadeTo('slow', 0.1);
            }
        });
    }
});

/**
* Hire form views
*/

// Single Form Item view
App.Views.FormItem = Backbone.View.extend({
    tagName: 'input',
    initialize: function(){
       this.render = _.bind(this.render, this);
    },
    attributes: function() {
      return {
        'name': this.model.get('name'),
        'placeholder': this.model.get('placeholder'),
        'type': this.model.get('type'),
        'size': this.model.get('size'),
        'maxlength': this.model.get('maxlength'),
        'value': this.model.get('value')
      };
    },
    template: template('formItemTemplate'),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
});

// Projects Item Filter Collection view
App.Views.HireForm = Backbone.View.extend({
    tagName: 'form',
    id: 'hire-form',
    initialize: function(){
       _.bindAll(this, 'save');
    },
    attributes: function() {
      return {
        'method': 'post',
      };
    },
    events: {
        'submit' : 'save'
    },
    render: function(){
        this.collection.each(this.addOne, this);
        return this;
    },
    // called from render method of collection view..
    addOne: function(formItem){
        var hireFormItem = new App.Views.FormItem({ model: formItem });
        this.$el.append(hireFormItem.render().el);
    },
    save: function(event){
        event.preventDefault();
        // creating a model for the info recieved from the hire form
        var hire = new Backbone.Model({
          email: $('[name=email]').val(),
          comment: $('[name=comment]').val(),
        });
        // saving info from hire form to the db
        hire.save(
            undefined,
            {
                url: serverUrl + 'hire',
                success: function(model, resp){
                    $("#hire-leave_comment-callback").html("THANKS FOR YOUR COMMENT!");
                },
                error: function(){
                    $("#hire-leave_comment-callback").html("ERROR ON SUBMIT :(");
                }
            }
        );
        return false;
    }

});

/*-----  End of VIEWS  ------*/

/*===============================
=            ROUTERS            =
===============================*/

/*-----  End of ROUTERS  ------*/

/*=============================================
=            RUNNING THE APP                  =
=============================================*/

//List of projects
var projectsCollection = new App.Collections.Projects();

//List of filters
var projectsItemFilterCollection = new App.Collections.ProjectsItemFilterCollection([
    {
        id: 'projects-prev',
        name: 'Prev'
    },
    {
        dataHref: 'all',
        name: 'All'
    },
    {
        dataHref: 'wapp',
        name: 'Web app dev'
    },
    {
        dataHref: 'fend',
        name: 'Only Front-end'
    },
    {
        dataHref: 'bend',
        name: 'Only Back-end'
    },
    {
        dataHref: 'cms',
        name: 'CMS&Blogging'
    },
    {
        dataHref: 'ecom',
        name: 'E-commerce'
    },
    {
        id: 'projects-next',
        name: 'Next'
    }
]);

//Fetching all projects
projectsCollection.fetch({success: function() {
    //Creating views for projects and filters
    var projectsView = new App.Views.Projects({ collection: projectsCollection });
    $('#projects-container').append(projectsView.render().el);
    var projectsFilterView = new App.Views.ProjectsItemFilterCollection({ collection: projectsItemFilterCollection });
    $('#projects-container').append(projectsFilterView.render().el);
    //Enabling roundabout for projects (word spinner)
    $('#projects').roundabout({shape: 'waterWheel', tilt: 0.0, btnNext: "#projects-next", btnPrev: "#projects-prev"});
}});

//Collection of items into hire form
var hireForm = new App.Collections.HireForm([
    {
        item: 'input',
        name: 'email',
        placeholder: 'your@email.here',
        type: 'email',
        size: '50',
        maxlength: '100',
        value: ''
    },
    {
        item: 'input',
        name: 'comment',
        placeholder: 'your comment (140 chars)',
        type: 'text',
        size: '50',
        maxlength: '140',
        value: ''
    },
    {
        item: 'input',
        type: 'submit',
        value: 'SEND'
    },
]);

//Creating hire form
var hireFormView = new App.Views.HireForm({ collection: hireForm });
$('#hire-form_container').append(hireFormView.render().el);

/*-----  End of RUNNING THE APP  ------*/

})();