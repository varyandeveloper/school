module.exports = class ClassCreate {
    constructor() {
        this.$subject = $('#class_subject');
        this.$teacher = $('#class_teacher');
        this.$student = $('#class_student');
        this.$duration = $('#class_duration');
    }

    onSubjectChange() {
        this.$subject.on('change', e => {
            const subject = $(e.currentTarget).val();
            if (this.$duration.val()) {
                this.loadUsers(subject, 'teachers', this.$teacher);
                this.loadUsers(subject, 'students', this.$student);
            }
        });
    }

    loadUsers(subjectId, type, $selector) {
        $.get('/' + type + '/by-subject/' + subjectId, {
            duration: this.$duration.val()
        }, response => {
            let placeholder = this.$teacher.find('option').eq(0);
            $selector.find('option').remove();
            $selector.append(placeholder);
            response[type].forEach(user => {
                $selector.append('<option value="'+user.id+'">'+user.user.name+'</option>');
            });
        });
    }

    init() {
        this.onSubjectChange();
    }
};
