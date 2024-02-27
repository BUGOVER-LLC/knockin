/** @format */

const auth = ({next, to}) => next();

const acceptCodePageCheck = ({next, to}) => {
    console.log(next, to);
};

export {acceptCodePageCheck, auth};
