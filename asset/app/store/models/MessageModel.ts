/** @format */

type MessageModel = {
    body: string;
    createdAt: string;
    targetId: string;
    in: boolean;
    out: boolean;
    viewed: boolean;
    edited: boolean;
    editedAt: string;
};
export default MessageModel;
