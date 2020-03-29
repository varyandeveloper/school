module.exports = class ClassCreate {
    constructor() {
        this.$subject = $('#class_subject');
        this.$teacher = $('#class_teacher');
        this.$student = $('#class_student');
        this.$duration = $('#class_duration');
    }

    onDurationChange() {
        this.$duration.on('change', this.checkToLoad);
    }

    onSubjectChange() {
        this.$subject.on('change', this.checkToLoad);
    }

    checkToLoad(e) {
        if (this.$duration.val() && this.$subject.val()) {
            this.loadUsers('teachers', this.$teacher);
            this.loadUsers('students', this.$student);
        }
    }

    loadUsers(type, $selector) {
        $.get('/' + type + '/by-subject/' + this.$subject.val(), {
            duration: this.$duration.val()
        }, response => {
            let placeholder = $selector.find('option').eq(0);
            $selector.find('option').remove();
            $selector.append(placeholder);
            response[type].forEach(user => {
                $selector.append('<option value="'+user.id+'">'+user.user.name+'</option>');
            });
        });
    }

    init() {
        this.checkToLoad = this.checkToLoad.bind(this);
        this.onDurationChange();
        this.onSubjectChange();
    }
};
