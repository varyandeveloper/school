module.exports = class ClassCreate {
    constructor() {
        this.$subject = $('#class_subject');
        this.$teacher = $('#class_teacher');
    }

    onSubjectChange() {
        this.$subject.on('change', e => {
            this.loadTeachers($(e.currentTarget).val());
        });
    }

    loadTeachers(subjectId) {
        $.get('/teachers/by-subject/' + subjectId, {}, response => {
            let placeholder = this.$teacher.find('option').eq(0);
            this.$teacher.find('option').remove();
            this.$teacher.append(placeholder);
            response.teachers.forEach(teacher => {
                this.$teacher.append('<option value="'+teacher.id+'">'+teacher.user.name+'</option>');
            });
        });
    }

    init() {
        this.onSubjectChange();
    }
};
