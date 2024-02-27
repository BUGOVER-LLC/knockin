--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1 (Ubuntu 15.1-1.pgdg20.04+1)
-- Dumped by pg_dump version 15.1 (Ubuntu 15.1-1.pgdg20.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: app; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA app;


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: board_stapes; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.board_stapes (
    board_stape_id bigint NOT NULL,
    board_id bigint NOT NULL,
    name character varying(300) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: board_stapes_board_stape_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.board_stapes_board_stape_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: board_stapes_board_stape_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.board_stapes_board_stape_id_seq OWNED BY app.board_stapes.board_stape_id;


--
-- Name: board_tasks; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.board_tasks (
    board_task_id bigint NOT NULL,
    stape_id bigint NOT NULL,
    creator_id bigint NOT NULL,
    channel_id bigint,
    title character varying(255) NOT NULL,
    body jsonb NOT NULL,
    assigned boolean DEFAULT false NOT NULL,
    status character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT board_tasks_status_check CHECK (((status)::text = ''::text))
);


--
-- Name: board_tasks_board_task_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.board_tasks_board_task_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: board_tasks_board_task_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.board_tasks_board_task_id_seq OWNED BY app.board_tasks.board_task_id;


--
-- Name: boards; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.boards (
    board_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    title character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    terms daterange
);


--
-- Name: boards_board_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.boards_board_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: boards_board_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.boards_board_id_seq OWNED BY app.boards.board_id;


--
-- Name: channels; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.channels (
    channel_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    creator_id bigint NOT NULL,
    uid uuid NOT NULL,
    name character varying(500) NOT NULL,
    status character varying(255) NOT NULL,
    total_connected smallint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT channels_status_check CHECK (((status)::text = ANY ((ARRAY['active'::character varying, 'archive'::character varying, 'trashed'::character varying])::text[])))
);


--
-- Name: channels_channel_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.channels_channel_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: channels_channel_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.channels_channel_id_seq OWNED BY app.channels.channel_id;


--
-- Name: countries; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.countries (
    country_id bigint NOT NULL,
    iso character(2) NOT NULL,
    iso3 character(3) NOT NULL,
    name character varying(80) NOT NULL,
    nice_name character varying(80) NOT NULL,
    phone_code smallint NOT NULL,
    phone_mask character varying(32) NOT NULL,
    currency character varying(50) NOT NULL,
    flag character varying(30) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: countries_country_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.countries_country_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: countries_country_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.countries_country_id_seq OWNED BY app.countries.country_id;


--
-- Name: devices; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.devices (
    device_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    model character varying(60) NOT NULL,
    type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT devices_type_check CHECK (((type)::text = ANY ((ARRAY['phone'::character varying, 'tablet'::character varying, 'web'::character varying, 'desktop'::character varying])::text[])))
);


--
-- Name: devices_device_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.devices_device_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: devices_device_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.devices_device_id_seq OWNED BY app.devices.device_id;


--
-- Name: messages; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.messages (
    message_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    channel_id bigint NOT NULL,
    author_id bigint NOT NULL,
    parent_id bigint NOT NULL,
    body json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: messages_message_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.messages_message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: messages_message_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.messages_message_id_seq OWNED BY app.messages.message_id;


--
-- Name: participants; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.participants (
    participant_id bigint NOT NULL,
    channel_id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_id timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: participants_participant_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.participants_participant_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: participants_participant_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.participants_participant_id_seq OWNED BY app.participants.participant_id;


--
-- Name: personal_access_tokens; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.personal_access_tokens (
    personal_access_token_id bigint NOT NULL,
    user_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: personal_access_tokens_personal_access_token_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.personal_access_tokens_personal_access_token_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: personal_access_tokens_personal_access_token_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.personal_access_tokens_personal_access_token_id_seq OWNED BY app.personal_access_tokens.personal_access_token_id;


--
-- Name: personal_messages; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.personal_messages (
    personal_message_id bigint NOT NULL,
    author_id bigint NOT NULL,
    participant_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    parent_id bigint,
    body json NOT NULL,
    viewed boolean DEFAULT false NOT NULL,
    viewed_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: personal_messages_personal_message_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.personal_messages_personal_message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: personal_messages_personal_message_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.personal_messages_personal_message_id_seq OWNED BY app.personal_messages.personal_message_id;


--
-- Name: personal_participants; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.personal_participants (
    personal_participant_id bigint NOT NULL,
    personal_id bigint NOT NULL,
    participant_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: personal_participants_personal_participant_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.personal_participants_personal_participant_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: personal_participants_personal_participant_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.personal_participants_personal_participant_id_seq OWNED BY app.personal_participants.personal_participant_id;


--
-- Name: shared_boards; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.shared_boards (
    shared_board_id bigint NOT NULL,
    board_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    target_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: shared_boards_shared_board_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.shared_boards_shared_board_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: shared_boards_shared_board_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.shared_boards_shared_board_id_seq OWNED BY app.shared_boards.shared_board_id;


--
-- Name: shared_channels; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.shared_channels (
    shared_channel_id bigint NOT NULL,
    channel_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    target_id bigint NOT NULL,
    uid uuid NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: shared_channels_shared_channel_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.shared_channels_shared_channel_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: shared_channels_shared_channel_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.shared_channels_shared_channel_id_seq OWNED BY app.shared_channels.shared_channel_id;


--
-- Name: shared_tasks; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.shared_tasks (
    shared_task_id bigint NOT NULL,
    task_id bigint NOT NULL,
    board_id bigint NOT NULL,
    target_id bigint NOT NULL,
    title character varying(300) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: shared_tasks_shared_task_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.shared_tasks_shared_task_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: shared_tasks_shared_task_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.shared_tasks_shared_task_id_seq OWNED BY app.shared_tasks.shared_task_id;


--
-- Name: task_execution; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.task_execution (
    task_execution_id bigint NOT NULL,
    task_id bigint NOT NULL,
    executor_id bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: task_execution_task_execution_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.task_execution_task_execution_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: task_execution_task_execution_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.task_execution_task_execution_id_seq OWNED BY app.task_execution.task_execution_id;


--
-- Name: user_device; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.user_device (
    user_device_id bigint NOT NULL,
    user_id bigint NOT NULL,
    device_id bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: user_device_user_device_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.user_device_user_device_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: user_device_user_device_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.user_device_user_device_id_seq OWNED BY app.user_device.user_device_id;


--
-- Name: users; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.users (
    user_id bigint NOT NULL,
    current_workspace_id bigint,
    current_device_id bigint,
    uid uuid NOT NULL,
    name character varying(150),
    phone character varying(32),
    email character varying(250) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    verified_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users_profile; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.users_profile (
    user_profile_id bigint NOT NULL,
    user_id bigint NOT NULL,
    country_id bigint NOT NULL,
    name character varying(200) NOT NULL,
    viewed_name character varying(300),
    photo character varying(300),
    role character varying(255),
    t_zone time(0) with time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users_profile_user_profile_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.users_profile_user_profile_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_profile_user_profile_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.users_profile_user_profile_id_seq OWNED BY app.users_profile.user_profile_id;


--
-- Name: users_user_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.users_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_user_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.users_user_id_seq OWNED BY app.users.user_id;


--
-- Name: workers; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.workers (
    worker_id bigint NOT NULL,
    workspace_id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_id timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: workers_worker_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.workers_worker_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: workers_worker_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.workers_worker_id_seq OWNED BY app.workers.worker_id;


--
-- Name: workspaces; Type: TABLE; Schema: app; Owner: -
--

CREATE TABLE app.workspaces (
    workspace_id bigint NOT NULL,
    creator_id bigint NOT NULL,
    uid uuid NOT NULL,
    name character varying(500) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: workspaces_workspace_id_seq; Type: SEQUENCE; Schema: app; Owner: -
--

CREATE SEQUENCE app.workspaces_workspace_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: workspaces_workspace_id_seq; Type: SEQUENCE OWNED BY; Schema: app; Owner: -
--

ALTER SEQUENCE app.workspaces_workspace_id_seq OWNED BY app.workspaces.workspace_id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


--
-- Name: telescope_entries; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.telescope_entries (
    sequence bigint NOT NULL,
    uuid uuid NOT NULL,
    batch_id uuid NOT NULL,
    family_hash character varying(255),
    should_display_on_index boolean DEFAULT true NOT NULL,
    type character varying(20) NOT NULL,
    content text NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: telescope_entries_sequence_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.telescope_entries_sequence_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: telescope_entries_sequence_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.telescope_entries_sequence_seq OWNED BY public.telescope_entries.sequence;


--
-- Name: telescope_entries_tags; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.telescope_entries_tags (
    entry_uuid uuid NOT NULL,
    tag character varying(255) NOT NULL
);


--
-- Name: telescope_monitoring; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.telescope_monitoring (
    tag character varying(255) NOT NULL
);


--
-- Name: board_stapes board_stape_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_stapes ALTER COLUMN board_stape_id SET DEFAULT nextval('app.board_stapes_board_stape_id_seq'::regclass);


--
-- Name: board_tasks board_task_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_tasks ALTER COLUMN board_task_id SET DEFAULT nextval('app.board_tasks_board_task_id_seq'::regclass);


--
-- Name: boards board_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.boards ALTER COLUMN board_id SET DEFAULT nextval('app.boards_board_id_seq'::regclass);


--
-- Name: channels channel_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.channels ALTER COLUMN channel_id SET DEFAULT nextval('app.channels_channel_id_seq'::regclass);


--
-- Name: countries country_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.countries ALTER COLUMN country_id SET DEFAULT nextval('app.countries_country_id_seq'::regclass);


--
-- Name: devices device_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.devices ALTER COLUMN device_id SET DEFAULT nextval('app.devices_device_id_seq'::regclass);


--
-- Name: messages message_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.messages ALTER COLUMN message_id SET DEFAULT nextval('app.messages_message_id_seq'::regclass);


--
-- Name: participants participant_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.participants ALTER COLUMN participant_id SET DEFAULT nextval('app.participants_participant_id_seq'::regclass);


--
-- Name: personal_access_tokens personal_access_token_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_access_tokens ALTER COLUMN personal_access_token_id SET DEFAULT nextval('app.personal_access_tokens_personal_access_token_id_seq'::regclass);


--
-- Name: personal_messages personal_message_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_messages ALTER COLUMN personal_message_id SET DEFAULT nextval('app.personal_messages_personal_message_id_seq'::regclass);


--
-- Name: personal_participants personal_participant_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_participants ALTER COLUMN personal_participant_id SET DEFAULT nextval('app.personal_participants_personal_participant_id_seq'::regclass);


--
-- Name: shared_boards shared_board_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_boards ALTER COLUMN shared_board_id SET DEFAULT nextval('app.shared_boards_shared_board_id_seq'::regclass);


--
-- Name: shared_channels shared_channel_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_channels ALTER COLUMN shared_channel_id SET DEFAULT nextval('app.shared_channels_shared_channel_id_seq'::regclass);


--
-- Name: shared_tasks shared_task_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_tasks ALTER COLUMN shared_task_id SET DEFAULT nextval('app.shared_tasks_shared_task_id_seq'::regclass);


--
-- Name: task_execution task_execution_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.task_execution ALTER COLUMN task_execution_id SET DEFAULT nextval('app.task_execution_task_execution_id_seq'::regclass);


--
-- Name: user_device user_device_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.user_device ALTER COLUMN user_device_id SET DEFAULT nextval('app.user_device_user_device_id_seq'::regclass);


--
-- Name: users user_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users ALTER COLUMN user_id SET DEFAULT nextval('app.users_user_id_seq'::regclass);


--
-- Name: users_profile user_profile_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users_profile ALTER COLUMN user_profile_id SET DEFAULT nextval('app.users_profile_user_profile_id_seq'::regclass);


--
-- Name: workers worker_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workers ALTER COLUMN worker_id SET DEFAULT nextval('app.workers_worker_id_seq'::regclass);


--
-- Name: workspaces workspace_id; Type: DEFAULT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workspaces ALTER COLUMN workspace_id SET DEFAULT nextval('app.workspaces_workspace_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: telescope_entries sequence; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.telescope_entries ALTER COLUMN sequence SET DEFAULT nextval('public.telescope_entries_sequence_seq'::regclass);


--
-- Name: board_stapes board_stapes_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_stapes
    ADD CONSTRAINT board_stapes_pkey PRIMARY KEY (board_stape_id);


--
-- Name: board_tasks board_tasks_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_tasks
    ADD CONSTRAINT board_tasks_pkey PRIMARY KEY (board_task_id);


--
-- Name: boards boards_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.boards
    ADD CONSTRAINT boards_pkey PRIMARY KEY (board_id);


--
-- Name: channels channels_name_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.channels
    ADD CONSTRAINT channels_name_unique UNIQUE (name);


--
-- Name: channels channels_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.channels
    ADD CONSTRAINT channels_pkey PRIMARY KEY (channel_id);


--
-- Name: countries countries_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (country_id);


--
-- Name: devices devices_model_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.devices
    ADD CONSTRAINT devices_model_unique UNIQUE (model);


--
-- Name: devices devices_name_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.devices
    ADD CONSTRAINT devices_name_unique UNIQUE (name);


--
-- Name: devices devices_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.devices
    ADD CONSTRAINT devices_pkey PRIMARY KEY (device_id);


--
-- Name: messages messages_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (message_id);


--
-- Name: participants participants_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.participants
    ADD CONSTRAINT participants_pkey PRIMARY KEY (participant_id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (personal_access_token_id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: personal_messages personal_messages_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_messages
    ADD CONSTRAINT personal_messages_pkey PRIMARY KEY (personal_message_id);


--
-- Name: personal_participants personal_participants_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_participants
    ADD CONSTRAINT personal_participants_pkey PRIMARY KEY (personal_participant_id);


--
-- Name: shared_boards shared_boards_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_boards
    ADD CONSTRAINT shared_boards_pkey PRIMARY KEY (shared_board_id);


--
-- Name: shared_channels shared_channels_name_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_channels
    ADD CONSTRAINT shared_channels_name_unique UNIQUE (name);


--
-- Name: shared_channels shared_channels_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_channels
    ADD CONSTRAINT shared_channels_pkey PRIMARY KEY (shared_channel_id);


--
-- Name: shared_tasks shared_tasks_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_tasks
    ADD CONSTRAINT shared_tasks_pkey PRIMARY KEY (shared_task_id);


--
-- Name: task_execution task_execution_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.task_execution
    ADD CONSTRAINT task_execution_pkey PRIMARY KEY (task_execution_id);


--
-- Name: user_device user_device_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.user_device
    ADD CONSTRAINT user_device_pkey PRIMARY KEY (user_device_id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_name_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_name_unique UNIQUE (name);


--
-- Name: users users_phone_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_phone_unique UNIQUE (phone);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);


--
-- Name: users_profile users_profile_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users_profile
    ADD CONSTRAINT users_profile_pkey PRIMARY KEY (user_profile_id);


--
-- Name: users users_uid_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_uid_unique UNIQUE (uid);


--
-- Name: workers workers_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workers
    ADD CONSTRAINT workers_pkey PRIMARY KEY (worker_id);


--
-- Name: workspaces workspaces_name_unique; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workspaces
    ADD CONSTRAINT workspaces_name_unique UNIQUE (name);


--
-- Name: workspaces workspaces_pkey; Type: CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workspaces
    ADD CONSTRAINT workspaces_pkey PRIMARY KEY (workspace_id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: telescope_entries telescope_entries_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.telescope_entries
    ADD CONSTRAINT telescope_entries_pkey PRIMARY KEY (sequence);


--
-- Name: telescope_entries_tags telescope_entries_tags_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.telescope_entries_tags
    ADD CONSTRAINT telescope_entries_tags_pkey PRIMARY KEY (entry_uuid, tag);


--
-- Name: telescope_entries telescope_entries_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.telescope_entries
    ADD CONSTRAINT telescope_entries_uuid_unique UNIQUE (uuid);


--
-- Name: telescope_monitoring telescope_monitoring_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.telescope_monitoring
    ADD CONSTRAINT telescope_monitoring_pkey PRIMARY KEY (tag);


--
-- Name: board_stapes_index_board_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_stapes_index_board_id ON app.board_stapes USING btree (board_id);


--
-- Name: board_stapes_index_board_stape_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_stapes_index_board_stape_id ON app.board_stapes USING btree (board_stape_id);


--
-- Name: board_stapes_index_name; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_stapes_index_name ON app.board_stapes USING btree (name);


--
-- Name: board_tasks_index_board_task_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_tasks_index_board_task_id ON app.board_tasks USING btree (board_task_id);


--
-- Name: board_tasks_index_body; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_tasks_index_body ON app.board_tasks USING btree (body);


--
-- Name: board_tasks_index_channel_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_tasks_index_channel_id ON app.board_tasks USING btree (channel_id);


--
-- Name: board_tasks_index_creator_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_tasks_index_creator_id ON app.board_tasks USING btree (creator_id);


--
-- Name: board_tasks_index_stape_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_tasks_index_stape_id ON app.board_tasks USING btree (stape_id);


--
-- Name: board_tasks_index_title; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX board_tasks_index_title ON app.board_tasks USING btree (title);


--
-- Name: boards_index_board_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX boards_index_board_id ON app.boards USING btree (board_id);


--
-- Name: boards_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX boards_index_workspace_id ON app.boards USING btree (workspace_id);


--
-- Name: channels_index_channel_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX channels_index_channel_id ON app.channels USING btree (channel_id);


--
-- Name: channels_index_creator_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX channels_index_creator_id ON app.channels USING btree (creator_id);


--
-- Name: channels_index_uid; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX channels_index_uid ON app.channels USING btree (uid);


--
-- Name: channels_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX channels_index_workspace_id ON app.channels USING btree (workspace_id);


--
-- Name: device_index_device_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX device_index_device_id ON app.devices USING btree (device_id);


--
-- Name: messages_fulltext_body; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX messages_fulltext_body ON app.messages USING gin (to_tsvector('english'::regconfig, body));


--
-- Name: messages_index_author_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX messages_index_author_id ON app.messages USING btree (author_id);


--
-- Name: messages_index_channel_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX messages_index_channel_id ON app.messages USING btree (channel_id);


--
-- Name: messages_index_message_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX messages_index_message_id ON app.messages USING btree (message_id);


--
-- Name: messages_index_parent_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX messages_index_parent_id ON app.messages USING btree (parent_id);


--
-- Name: messages_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX messages_index_workspace_id ON app.messages USING btree (workspace_id);


--
-- Name: participants_index_channel_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX participants_index_channel_id ON app.participants USING btree (channel_id);


--
-- Name: participants_index_participant_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX participants_index_participant_id ON app.participants USING btree (participant_id);


--
-- Name: participants_index_user_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX participants_index_user_id ON app.participants USING btree (user_id);


--
-- Name: personal_access_tokens_index_personal_access_token_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_access_tokens_index_personal_access_token_id ON app.personal_access_tokens USING btree (personal_access_token_id);


--
-- Name: personal_access_tokens_index_user_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_access_tokens_index_user_id ON app.personal_access_tokens USING btree (user_id);


--
-- Name: personal_messages_fulltext_body; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_messages_fulltext_body ON app.personal_messages USING gin (to_tsvector('english'::regconfig, body));


--
-- Name: personal_messages_index_author_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_messages_index_author_id ON app.personal_messages USING btree (author_id);


--
-- Name: personal_messages_index_parent_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_messages_index_parent_id ON app.personal_messages USING btree (parent_id);


--
-- Name: personal_messages_index_participant_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_messages_index_participant_id ON app.personal_messages USING btree (participant_id);


--
-- Name: personal_messages_index_personal_message_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_messages_index_personal_message_id ON app.personal_messages USING btree (personal_message_id);


--
-- Name: personal_messages_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_messages_index_workspace_id ON app.personal_messages USING btree (workspace_id);


--
-- Name: personal_participants_index_participant_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_participants_index_participant_id ON app.personal_participants USING btree (participant_id);


--
-- Name: personal_participants_index_personal_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_participants_index_personal_id ON app.personal_participants USING btree (personal_id);


--
-- Name: personal_participants_index_personal_participant_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX personal_participants_index_personal_participant_id ON app.personal_participants USING btree (personal_participant_id);


--
-- Name: shared_boards_index_board_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_boards_index_board_id ON app.shared_boards USING btree (board_id);


--
-- Name: shared_boards_index_shared_board_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_boards_index_shared_board_id ON app.shared_boards USING btree (shared_board_id);


--
-- Name: shared_boards_index_target_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_boards_index_target_id ON app.shared_boards USING btree (target_id);


--
-- Name: shared_boards_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_boards_index_workspace_id ON app.shared_boards USING btree (workspace_id);


--
-- Name: shared_channels_index_channel_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_channels_index_channel_id ON app.shared_channels USING btree (channel_id);


--
-- Name: shared_channels_index_shared_channel_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_channels_index_shared_channel_id ON app.shared_channels USING btree (shared_channel_id);


--
-- Name: shared_channels_index_target_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_channels_index_target_id ON app.shared_channels USING btree (target_id);


--
-- Name: shared_channels_index_uid; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_channels_index_uid ON app.shared_channels USING btree (uid);


--
-- Name: shared_channels_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_channels_index_workspace_id ON app.shared_channels USING btree (workspace_id);


--
-- Name: shared_tasks_index_board_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_tasks_index_board_id ON app.shared_tasks USING btree (board_id);


--
-- Name: shared_tasks_index_shared_task_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_tasks_index_shared_task_id ON app.shared_tasks USING btree (shared_task_id);


--
-- Name: shared_tasks_index_target_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_tasks_index_target_id ON app.shared_tasks USING btree (target_id);


--
-- Name: shared_tasks_index_task_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX shared_tasks_index_task_id ON app.shared_tasks USING btree (task_id);


--
-- Name: task_execution_executor_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX task_execution_executor_id ON app.task_execution USING btree (executor_id);


--
-- Name: task_execution_task_execution_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX task_execution_task_execution_id ON app.task_execution USING btree (task_execution_id);


--
-- Name: task_execution_task_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX task_execution_task_id ON app.task_execution USING btree (task_id);


--
-- Name: user_device_index_device_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX user_device_index_device_id ON app.user_device USING btree (device_id);


--
-- Name: user_device_index_user_device_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX user_device_index_user_device_id ON app.user_device USING btree (user_device_id);


--
-- Name: user_device_index_user_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX user_device_index_user_id ON app.user_device USING btree (user_id);


--
-- Name: users_index_current_device_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX users_index_current_device_id ON app.users USING btree (current_device_id);


--
-- Name: users_index_current_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX users_index_current_workspace_id ON app.users USING btree (current_workspace_id);


--
-- Name: users_index_user_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX users_index_user_id ON app.users USING btree (user_id);


--
-- Name: users_profile_index_country_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX users_profile_index_country_id ON app.users_profile USING btree (country_id);


--
-- Name: users_profile_index_user_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX users_profile_index_user_id ON app.users_profile USING btree (user_id);


--
-- Name: users_profile_index_user_profile_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX users_profile_index_user_profile_id ON app.users_profile USING btree (user_profile_id);


--
-- Name: workers_index_user_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX workers_index_user_id ON app.workers USING btree (user_id);


--
-- Name: workers_index_worker_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX workers_index_worker_id ON app.workers USING btree (worker_id);


--
-- Name: workers_index_workspace_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX workers_index_workspace_id ON app.workers USING btree (workspace_id);


--
-- Name: workspace_index_creator_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX workspace_index_creator_id ON app.workspaces USING btree (creator_id);


--
-- Name: workspace_index_id; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX workspace_index_id ON app.workspaces USING btree (workspace_id);


--
-- Name: workspace_index_uid; Type: INDEX; Schema: app; Owner: -
--

CREATE INDEX workspace_index_uid ON app.workspaces USING btree (uid);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: telescope_entries_batch_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX telescope_entries_batch_id_index ON public.telescope_entries USING btree (batch_id);


--
-- Name: telescope_entries_created_at_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX telescope_entries_created_at_index ON public.telescope_entries USING btree (created_at);


--
-- Name: telescope_entries_family_hash_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX telescope_entries_family_hash_index ON public.telescope_entries USING btree (family_hash);


--
-- Name: telescope_entries_tags_tag_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX telescope_entries_tags_tag_index ON public.telescope_entries_tags USING btree (tag);


--
-- Name: telescope_entries_type_should_display_on_index_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX telescope_entries_type_should_display_on_index_index ON public.telescope_entries USING btree (type, should_display_on_index);


--
-- Name: board_stapes board_steps_foreign_board_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_stapes
    ADD CONSTRAINT board_steps_foreign_board_id FOREIGN KEY (board_id) REFERENCES app.boards(board_id) ON DELETE CASCADE;


--
-- Name: board_tasks board_tasks_foreign_channel_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_tasks
    ADD CONSTRAINT board_tasks_foreign_channel_id FOREIGN KEY (channel_id) REFERENCES app.channels(channel_id) ON DELETE CASCADE;


--
-- Name: board_tasks board_tasks_foreign_creator_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_tasks
    ADD CONSTRAINT board_tasks_foreign_creator_id FOREIGN KEY (creator_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: board_tasks board_tasks_foreign_stape_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.board_tasks
    ADD CONSTRAINT board_tasks_foreign_stape_id FOREIGN KEY (stape_id) REFERENCES app.board_stapes(board_stape_id) ON DELETE CASCADE;


--
-- Name: boards boards_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.boards
    ADD CONSTRAINT boards_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: channels channels_foreign_creator_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.channels
    ADD CONSTRAINT channels_foreign_creator_id FOREIGN KEY (creator_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: channels channels_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.channels
    ADD CONSTRAINT channels_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: messages messages_foreign_author_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.messages
    ADD CONSTRAINT messages_foreign_author_id FOREIGN KEY (author_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: messages messages_foreign_channel_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.messages
    ADD CONSTRAINT messages_foreign_channel_id FOREIGN KEY (channel_id) REFERENCES app.channels(channel_id) ON DELETE CASCADE;


--
-- Name: messages messages_foreign_parent_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.messages
    ADD CONSTRAINT messages_foreign_parent_id FOREIGN KEY (parent_id) REFERENCES app.messages(message_id) ON DELETE CASCADE;


--
-- Name: messages messages_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.messages
    ADD CONSTRAINT messages_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: participants participants_foreign_channel_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.participants
    ADD CONSTRAINT participants_foreign_channel_id FOREIGN KEY (channel_id) REFERENCES app.channels(channel_id) ON DELETE CASCADE;


--
-- Name: participants participants_foreign_user_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.participants
    ADD CONSTRAINT participants_foreign_user_id FOREIGN KEY (user_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: personal_access_tokens personal_access_tokens_foreign_user_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_foreign_user_id FOREIGN KEY (user_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: personal_messages personal_messages_foreign_author_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_messages
    ADD CONSTRAINT personal_messages_foreign_author_id FOREIGN KEY (author_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: personal_messages personal_messages_foreign_parent_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_messages
    ADD CONSTRAINT personal_messages_foreign_parent_id FOREIGN KEY (parent_id) REFERENCES app.personal_messages(personal_message_id) ON DELETE CASCADE;


--
-- Name: personal_messages personal_messages_foreign_participant_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_messages
    ADD CONSTRAINT personal_messages_foreign_participant_id FOREIGN KEY (participant_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: personal_messages personal_messages_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_messages
    ADD CONSTRAINT personal_messages_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: personal_participants personal_participants_foreign_participant_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_participants
    ADD CONSTRAINT personal_participants_foreign_participant_id FOREIGN KEY (participant_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: personal_participants personal_participants_foreign_personal_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.personal_participants
    ADD CONSTRAINT personal_participants_foreign_personal_id FOREIGN KEY (personal_id) REFERENCES app.personal_messages(personal_message_id) ON DELETE CASCADE;


--
-- Name: shared_boards shared_boards_foreign_board_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_boards
    ADD CONSTRAINT shared_boards_foreign_board_id FOREIGN KEY (board_id) REFERENCES app.boards(board_id) ON DELETE CASCADE;


--
-- Name: shared_boards shared_boards_foreign_target_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_boards
    ADD CONSTRAINT shared_boards_foreign_target_id FOREIGN KEY (target_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: shared_boards shared_boards_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_boards
    ADD CONSTRAINT shared_boards_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: shared_channels shared_channels_foreign_channel_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_channels
    ADD CONSTRAINT shared_channels_foreign_channel_id FOREIGN KEY (channel_id) REFERENCES app.channels(channel_id) ON DELETE CASCADE;


--
-- Name: shared_channels shared_channels_foreign_target_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_channels
    ADD CONSTRAINT shared_channels_foreign_target_id FOREIGN KEY (target_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: shared_channels shared_channels_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_channels
    ADD CONSTRAINT shared_channels_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: shared_tasks shared_tasks_foreign_board_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_tasks
    ADD CONSTRAINT shared_tasks_foreign_board_id FOREIGN KEY (board_id) REFERENCES app.boards(board_id) ON DELETE CASCADE;


--
-- Name: shared_tasks shared_tasks_foreign_target_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_tasks
    ADD CONSTRAINT shared_tasks_foreign_target_id FOREIGN KEY (target_id) REFERENCES app.boards(board_id) ON DELETE CASCADE;


--
-- Name: shared_tasks shared_tasks_foreign_task_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.shared_tasks
    ADD CONSTRAINT shared_tasks_foreign_task_id FOREIGN KEY (task_id) REFERENCES app.board_tasks(board_task_id) ON DELETE CASCADE;


--
-- Name: task_execution task_execution_foreign_executor_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.task_execution
    ADD CONSTRAINT task_execution_foreign_executor_id FOREIGN KEY (executor_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: task_execution task_execution_foreign_task_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.task_execution
    ADD CONSTRAINT task_execution_foreign_task_id FOREIGN KEY (task_id) REFERENCES app.board_tasks(board_task_id) ON DELETE CASCADE;


--
-- Name: user_device users_device_foreign_current_device_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.user_device
    ADD CONSTRAINT users_device_foreign_current_device_id FOREIGN KEY (device_id) REFERENCES app.devices(device_id) ON DELETE CASCADE;


--
-- Name: user_device users_device_foreign_user_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.user_device
    ADD CONSTRAINT users_device_foreign_user_id FOREIGN KEY (user_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: users users_foreign_current_device_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_foreign_current_device_id FOREIGN KEY (current_device_id) REFERENCES app.devices(device_id) ON DELETE CASCADE;


--
-- Name: users users_foreign_current_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users
    ADD CONSTRAINT users_foreign_current_workspace_id FOREIGN KEY (current_workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: users_profile users_profile_foreign_country_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users_profile
    ADD CONSTRAINT users_profile_foreign_country_id FOREIGN KEY (country_id) REFERENCES app.countries(country_id) ON DELETE CASCADE;


--
-- Name: users_profile users_profile_foreign_user_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.users_profile
    ADD CONSTRAINT users_profile_foreign_user_id FOREIGN KEY (user_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: workers workers_foreign_user_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workers
    ADD CONSTRAINT workers_foreign_user_id FOREIGN KEY (user_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: workers workers_foreign_workspace_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workers
    ADD CONSTRAINT workers_foreign_workspace_id FOREIGN KEY (workspace_id) REFERENCES app.workspaces(workspace_id) ON DELETE CASCADE;


--
-- Name: workspaces workspaces_foreign_creator_id; Type: FK CONSTRAINT; Schema: app; Owner: -
--

ALTER TABLE ONLY app.workspaces
    ADD CONSTRAINT workspaces_foreign_creator_id FOREIGN KEY (creator_id) REFERENCES app.users(user_id) ON DELETE CASCADE;


--
-- Name: telescope_entries_tags telescope_entries_tags_entry_uuid_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.telescope_entries_tags
    ADD CONSTRAINT telescope_entries_tags_entry_uuid_foreign FOREIGN KEY (entry_uuid) REFERENCES public.telescope_entries(uuid) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1 (Ubuntu 15.1-1.pgdg20.04+1)
-- Dumped by pg_dump version 15.1 (Ubuntu 15.1-1.pgdg20.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_reset_tokens_table	1
3	2018_08_08_100000_create_telescope_entries_table	1
4	2019_08_19_000000_create_failed_jobs_table	1
5	2019_12_14_000001_create_personal_access_tokens_table	1
6	2023_02_20_075148_create_workspaces_table	1
7	2023_02_20_075159_create_channels_table	1
8	2023_02_20_075212_create_shared_channels_table	1
9	2023_02_20_075220_create_messages_table	1
10	2023_02_20_081329_create_workers_table	1
11	2023_02_20_081330_create_devices_table	1
12	2023_02_20_081354_create_participants_table	1
13	2023_02_20_082649_add_foreign_keys_to_workspaces_table	1
14	2023_02_20_082700_add_foreign_keys_to_channels_table	1
15	2023_02_20_082709_add_foreign_keys_to_shared_channels_table	1
16	2023_02_20_082725_add_foreign_keys_to_messages_table	1
17	2023_02_20_082744_add_foreign_keys_to_workers_table	1
18	2023_02_20_082758_add_foreign_keys_to_participants_table	1
19	2023_02_20_110547_create_users_profile_table	1
20	2023_02_20_114712_create_countries_table	1
21	2023_02_21_205653_create_personal_messages_table	1
22	2023_02_21_205854_add_foreign_keys_to_personal_messages_table	1
23	2023_02_22_073527_create_boards_table	1
24	2023_02_22_073707_add_foreign_keys_to_boards_table	1
25	2023_02_22_073725_create_board_stapes_table	1
26	2023_02_22_073741_add_foreign_keys_to_board_stapes_table	1
27	2023_02_22_073800_create_board_tasks_table	1
28	2023_02_22_073816_add_foreign_keys_to_board_tasks_table	1
29	2023_02_22_073845_create_shared_boards_table	1
30	2023_02_22_073905_add_foreign_keys_to_shared_boards_table	1
31	2023_02_22_073918_create_shared_tasks_table	1
32	2023_02_22_073939_add_foreign_keys_to_shared_tasks_table	1
33	2023_02_22_111313_add_foreign_keys_to_users_profile_table	1
34	2023_02_23_132316_add_foreign_keys_to_users_table	1
35	2023_02_23_193816_create_task_execution_table	1
36	2023_02_23_193957_add_foreign_keys_to_task_execution_table	1
37	2023_02_24_112534_add_foreign_keys_to_personal_access_tokens_table	1
38	2023_03_03_211148_create_personal_participants_table	1
39	2023_03_03_211310_add_foreign_keys_to_personal_participants_table	1
40	2023_04_28_204651_create_user_device_table	1
41	2023_04_28_205851_add_foreign_keys_to_user_device_table	1
42	2023_05_08_093741_create_sessions_table	1
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 42, true);


--
-- PostgreSQL database dump complete
--

